<?php

namespace App\Controller;
use Cake\View\JsonView;
use App\Controller\AppController;

class NotesController extends AppController
{

    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    //When a request is made to an action in this controller, CakePHP will use the JsonView class to format and output the response in JSON format.
    

    public function index()
    {
        $notes = $this->Notes->find('all')->all();
        $this->set('notes',$notes);
        $this->viewBuilder()->setOption('serialize', ['notes']);
    }

    public function view($id)
    {
        $note = $this->Notes->get($id);
        $this->set('note',$note);
        $this->viewBuilder()->setOption('serialize', ['note']);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $note = $this->Notes->newEntity($this->request->getData());
        if ($this->Notes->save($note)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'note' => $note,
        ]);
        $this->viewBuilder()->setOption('serialize', ['note', 'message']);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch','post', 'put']);
        $note = $this->Notes->get($id);
        $note = $this->Notes->patchEntity($note,$this->request->getData());
        if ($this->Notes->save($note)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'note' => $note,
        ]);
        $this->viewBuilder()->setOption('serialize', ['note', 'message']);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        try{
        $note = $this->Notes->get($id);
        if ($this->Notes->delete($note)) {
            $message = 'Deleted';
        }
        }catch (\Cake\Datasource\Exception\RecordNotFoundException $e){ 
            $message = 'Note not found'; 
        }
        
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}


