<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function __construct()
    {
        $this->student = new \App\Models\MainModel();
        $this->section = new \App\Models\Section();
        helper('url');
    }

    public function index()
    {
        $data = [
            'students' => $this->student->findAll(),
            'sections' => $this->section->findAll()
        ];
        return view('index', $data);
    }

    public function saveOrUpdate($modelType, $successMessage)
    {
        $data = [];

        if ($modelType === 'student') {
            $data = [
                'StudName' => $this->request->getVar('StudName'),
                'StudGender' => $this->request->getVar('StudGender'),
                'StudCourse' => $this->request->getVar('StudCourse'),
                'StudSection' => $this->request->getVar('StudSection'),
                'StudYear' => $this->request->getVar('StudYear'),
            ];

            $operation = 'Student was ';
        } elseif ($modelType === 'section') {
            $data = [
                'Section' => $this->request->getVar('Section'),
            ];

            $operation = 'Section was ';
        }

        $model = $modelType === 'student' ? $this->student : $this->section;

        $id = $this->request->getVar('id');

        if ($id) {
            $model->update($id, $data);
            $operation .= 'updated successfully.';
        } else {
            $model->insert($data);
            $operation .= 'added successfully.';
        }
        
        session()->setFlashdata('success', $operation);
        return redirect()->to(base_url(''));
    }


    public function deleteOrRemove($model, $id, $successMessage)
    {
        $model->delete($id);
        session()->setFlashdata('success', $successMessage);
        return redirect()->to(base_url(''));
    }


    public function delete($id)
    {
        $successMessage = "Student was deleted successfully.";
        return $this->deleteOrRemove($this->student, $id, $successMessage);
    }

    public function remove($id)
    {
        $studentsCount = $this->student->where('StudSection', $id)->countAllResults();

        if ($studentsCount > 0) {
            session()->setFlashdata('remove_error', true);
            return redirect()->to(base_url(''));
        } else {
            $successMessage = "Section was removed successfully.";
            return $this->deleteOrRemove($this->section, $id, $successMessage);
        }
    }

    public function save()
    {
        $successMessage = "Student was added successfully.";
        return $this->saveOrUpdate('student', $successMessage);
    }

    public function add()
    {
        $successMessage = "Section was updated successfully.";
        return $this->saveOrUpdate('section', $successMessage);
    }


    public function editOrEditSection($type, $id)
    {
        $data = [
            'action' => $id ? 'Update' : 'Create',
            'students' => $this->student->findAll(),
            'sections' => $this->section->findAll(),
        ];

        if ($type === 'student') {
            $data['val'] = $this->student->where('id', $id)->first();
        } elseif ($type === 'section') {
            $data['val'] = $this->section->where('Section', $id)->first();
            $data['actionSection'] = $id ? 'Update' : 'Create';
        } else {

        }

        return view('index', $data);
    }

    public function edit($id)
    {
        return $this->editOrEditSection('student', $id);
    }

    public function editSection($id)
    {
        return $this->editOrEditSection('section', $id);
    }

    }
