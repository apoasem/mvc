<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 9/19/2018
 * Time: 3:26 PM
 */

namespace PHPMVC\Controllers;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;  // use trait
    use Helper;

    public function defaultAction()
    {
        $this->language->load('employee.default');
        $this->language->load('template.common');
        $this->_data['employees'] = EmployeeModel::getAll();
        
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->_view();
        $emp = new EmployeeModel();

        if (isset($_POST['submit']))
        {
            $this->filterString( $emp->setName($_POST['name']) );
            $this->filterFloat( $emp->setTax($_POST['tax']) );
            $this->filterFloat( $emp->setSalary($_POST['salary']) );
            $this->filterInt( $emp->setAge($_POST['age']) );
            $this->filterString( $emp->setAddress($_POST['address']) );

            if($emp->save());
            {
                $_SESSION['message'] = 'Employee Saved Successfully';
                $this->redirect('/employee');
            }
        }
        var_dump($emp);
    }


    public function editAction()
    {
        $id = $this->filterInt($this->params[0]);
        var_dump($id);

        $emp = EmployeeModel::getByPK($id);

        if($emp === false)
        {
            $this->redirect('/employee');
        }

        $this->language->load('template.common');

        $this->_data['employee'] = $emp;  // pass it to view

        $this->_view();

        if (isset($_POST['submit']))
        {
            $this->filterString( $emp->setName($_POST['name']) );
            $this->filterFloat( $emp->setTax($_POST['tax']) );
            $this->filterFloat( $emp->setSalary($_POST['salary']) );
            $this->filterInt( $emp->setAge($_POST['age']) );
            $this->filterString( $emp->setAddress($_POST['address']) );

            if($emp->save());
            {
                $_SESSION['message'] = 'Employee Updated Successfully';
                $this->redirect('/employee');
            }
        }
    }


    public function deleteAction()
    {
        $id = $this->filterInt($this->params[0]);

        $emp = EmployeeModel::getByPK($id);

        if($emp === false)
        {
            $this->redirect('/employee');
        }

        if($emp->delete())  // method inhierited from abstract class
        {
            $_SESSION['message'] = 'Employee, deleted successfully';
            $this->redirect('/employee');
        }
    }


}