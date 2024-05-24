<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('username', __('Username'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created At'))->sortable();
        $grid->column('updated_at', __('Updated At'));

        return $grid;
    }


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('name', __('Name'));
        $show->field('avatar', __('Avatar'));
        $show->field('remember_token', __('Remember Token'));
        $show->field('created_at', __('Created At'));
        $show->field('updated_at', __('Updated At'));
        $show->field('company_id', __('Company ID'));
        $show->field('first_name', __('First Name'));
        $show->field('last_name', __('Last Name'));
        $show->field('phone_number', __('Phone Number'));
        $show->field('phone_number_2', __('Phone Number 2'));
        $show->field('address', __('Address'));
        $show->field('sex', __('Sex'));
        $show->field('dob', __('DOB'));
        $show->field('status', __('Status'));
        $show->field('email', __('Email'));

        return $show;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('username', __('Username'))->rules('required|string|max:255');
        $form->password('password', __('Password'))->rules('required|string|min:8|confirmed');
        $form->text('name', __('Name'))->rules('required|string|max:255');
        $form->image('avatar', __('Avatar'))->rules('image|max:2048'); // Adjust image validation as needed
        $form->text('remember_token', __('Remember Token'));
        $form->number('company_id', __('Company ID'))->rules('integer|min:1'); // Adjust company ID validation as needed
        $form->text('first_name', __('First Name'))->rules('string|max:255');
        $form->text('last_name', __('Last Name'))->rules('string|max:255');
        $form->text('phone_number', __('Phone Number'))->rules('string|max:255');
        $form->text('phone_number_2', __('Phone Number 2'))->rules('string|max:255');
        $form->text('address', __('Address'))->rules('string|max:255');
        $form->text('sex', __('Sex'))->rules('string|max:255');
        $form->date('dob', __('DOB'))->rules('date');
        $form->text('status', __('Status'))->rules('string|max:255');
        $form->email('email', __('Email'))->rules('required|string|email|max:255|unique:users,email');

        return $form;
    }
}
