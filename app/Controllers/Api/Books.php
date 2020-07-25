<?php namespace App\Controllers\Api;

use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Books as BooksModel;
use App\Models\Generic as GenericModel;
 
class Books extends ResourceController
{
    use ResponseTrait;
    
    // get all Books
    public function index()
    {
        $search = $this->request->getGet();
        $model = new BooksModel();

        if($search === null || !isset($search['search']) ){
            $data = $model->findAll();
        }
        else{

            $db = \Config\Database::connect();
            $GenericModel = new GenericModel($db);
            $search = $this->request->getGet();
            $data_where = array(
                'name'          => $search['search'],
                'country'       => $search['search'],
                'publisher'     => $search['search'],
                'release_date'  => $search['search']
            );
            
            $data= $GenericModel->findByCondition($data_where,'books', 'like');
        }
        if($data === false)
        {
            return $this->failServerError();
        }
        $response = [
            'status_code'   => 200,
            'status'    => 'success',
            'data' => [
                $data
            ]
        ];
        return $this->respond($response);
    }
 
    // create a Book
    public function create()
    {
        $data = $this->request->getPost();

        $bookModel = new BooksModel();
        $dataId = $bookModel->insert($data);

        if($bookModel->errors())
        {
            return $this->fail($bookModel->errors());
        }
        if($dataId === false)
        {
            return $this->failServerError();
        }
        
        $dataBooks = $bookModel->find($dataId);
        $dataBooks['url'] = site_url('/api/v1/books/'.$dataId);
        $response = [
            'status_code'   => 201,
            'status'    => 'success',
            'data' => [
                $dataBooks
            ]
        ];
        return $this->respondCreated($response);
    }

    // get single Books
    public function show($id = null)
    {
        $model = new BooksModel();
        //$data = $model->getWhere(['id' => $id])->getResult();
        $data = $model->find($id);
        if($data){
            $response = [
                'status_code'   => 200,
                'status'    => 'success',
                'data' => [
                    $data
                ]
            ];
            return $this->respond($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id, 404);
        }
    }
 
    // update Books
    public function update($id = null)
    {
        $bookModel = new BooksModel();

        $data = $this->request->getRawInput();

        $dataBooks = $bookModel->find($id);

        $update = $bookModel->update($id, $data);

        if($bookModel->errors())
        {
            return $this->fail($bookModel->errors());
        }
        if($update === false)
        {
            return $this->failServerError();
        }
        $response = [
            'status_code'   => 200,
            'status'    => 'success',
            'message' => 'The book '.$dataBooks['name'] .' was updated successfully',
            'data' => [
                $bookModel->find($id)
            ]
        ];
        return $this->respond($response);
    }
 
    // delete Books
    public function delete($id = null)
    {
        $bookModel = new BooksModel();
        $data = $bookModel->find($id);
        if($data){
            $bookModel->delete($id);
            $response = [
                'status_code'   => 204,
                'status'    => 'success',
                'messages' => 'The book '.$data['name'] .' was deleted successfully',
                'data' => []
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }

    // get Ice And Fire API all Books

    public function externalBook()
    {
        $db = \Config\Database::connect();
        $GenericModel = new GenericModel($db);
        
        $search = $this->request->getGet();

        if($search === null || !isset($search['search']) ){
            $data = $GenericModel->getIceAndFireAPI();
        }
        else{

           
            $search = $this->request->getGet();
            $data_where = array(
                'name'          => $search['nameOfABook']
            );
            
            $data= $GenericModel->findByNameIceAndFireAPI($data_where);
        }
        if($data === false)
        {
            return $this->failServerError();
        }
        $response = [
            'status_code'   => 200,
            'status'    => 'success',
            'data' => [
                $data
            ]
        ];
        return $this->respond($response);
    }
 
}
