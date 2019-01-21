<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;
use App\Admin;
use App\Product;
class AjaxController extends Controller {

  public function testIndex() {
    return view('ajaxtest');
  }

    public function index()
    {
       return view('live_search');
    }


        public function cartBarPost(Request $request, $id) {

          $product = Product::find($id);

          Cart::add($id, $product->name, 1, $product->price);
          $cartCount = Cart::content()->count();

          $data = array(
            'cartCount' => $cartCount
          );
          echo json_encode($data);

      }


    public function userAction(Request $request)
    {

        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('users')
          ->where('firstName', 'like', '%'.$query.'%')
          ->orWhere('email', 'like', '%'.$query.'%')
          ->orWhere('lastName', 'like', '%'.$query.'%')
          ->orWhere('addressline', 'like', '%'.$query.'%')
          ->orWhere('postnr', 'like', '%'.$query.'%')
          ->orWhere('place', 'like', '%'.$query.'%')
          ->orWhere('phone', 'like', '%'.$query.'%')
          ->orWhere('created_at', 'like', '%'.$query.'%')
          ->orWhere('credits', 'like', '%'.$query.'%')
          ->orderBy('id', 'desc')
          ->get();
        }
        else
        {
          $data = DB::table('users')
          ->orderBy('id', 'asc')
          ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
          $output = array();
          foreach($data as $row)
          {
            if($row->admin == 1) {
              $role = "admin";
            }
            elseif($row->client == 1) {
              $role="client";
            }
            elseif($row->driver == 1) {
              $role = "sjåfør";
            }
            else {
              $role = "bruker";
            }
            $output[] = '
            <tr>
              <td>'.$row->id.'</td>
              <td>'.$row->email.'</td>
              <td>'.$row->firstName.'</td>
              <td>'.$row->lastName.'</td>
              <td>'.$row->addressline.'</td>
              <td>'.$row->postnr.'</td>
              <td>'.$row->place.'</td>
              <td>'.$row->phone.'</td>
              <td>'.$row->confirmed.'</td>
              <td>'.$role.'</td>
              <td>'.$row->created_at.'</td>
              <td>'.$row->credits.'</td>
              <td><a href="users/edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a></td>
              <td><a href="admin/users/destroy/'.$row->id.'"><i style="color:red;" class="fas fa-times"></i></a></td>

            </tr>
            ';
          }
        }
        else {
          $output = '
          <tr>
            <td align="center" colspan="5">No Data Found</td>
          </tr>
          ';

          }
          $data = array(
            'table_data' => $output,
            'total_row' => $total_row,
          );
          echo json_encode($data);

      }

      public function searchPostnr(Request $request) {
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('postnrs')
          ->where('name', 'like', '%'.$query.'%')
          ->get();
          $total_row = 0;
                      $output = array();
                      
          foreach($data as $row)
          {

            $output[] = '
              <li>'.$row->name.'</li>
              <hr />
            ';
          }
        }
        else {
          $output[] = '';
        }
          if(empty($output)) {
            $output[] = '<li>Vi leverer desverre ikke hit (enda)</li>';
          }

          $data = array(
            'table_data' => $output,
          );
          echo json_encode($data);
        }





        }
