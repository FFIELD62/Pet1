<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\Type;
use Illuminate\Http\Request;
use Config,Validator;

class PetController extends Controller
{
    var $rp = 3;
    public function index() {
        $pets = Pet::all();
        return view('pet/index', compact('pets'));
    }

    public function search(Request $request) {
        $query = $request->q;
        if($query) {
            $pets = Pet::where('name', 'like', '%'.$query.'%')
            ->orWhere('id', 'like', '%'.$query.'%')
            ->paginate($this->rp);
        }
        else {
            $pets = Pet::paginate($this->rp);
        }
        return view('pet/index', compact('pets'));
    }

    public function edit ($id = null) {
        $types = Type::pluck('name', 'id')->prepend('เลือกประเภท', '');
        if ($id) {
          
             $pets = Pet::find($id); return view('pet/edit')
             ->with('pets', $pets)
             ->with('types', $types);
        } else {
             
             return view('pet/add')
             ->with('types', $types);
        }
       
     }
 
     public function update(Request $request) {
       $rules = array(
             'id' => 'required',
             'name' => 'required',
             'type_id' => 'required',
       );
 
       $messages = array(
         'required' => 'ข้อมูล :attribute จำเป็นต้องกรอก',
         'numeric' => 'ข้อมูล :attribute ต้องเป็นตัวเลข',
     );
 
     $id = $request->id;
     
     $temp = array(
         'id' => $request->id,
         'name' => $request->name,
         'type_id' => $request->type_id,
     );
 
     $validator = Validator::make($temp, $rules, $messages);
     if($validator->fails()) {
         return redirect('pet/edit/' . $id)
         ->withErrors($validator)
         ->withInput();
     }
             
     $pets = Pet::find($id);
     $pets->name = $request->name;
     $pets->type_id = $request->type_id;
     
     $pets->save();
 
     if($request->hasFile('image'))
     {
         $f = $request->file('image');
         $upload_to = 'upload/images';
 
         $relative_path = $upload_to.'/'.$f->getClientOriginalName();
         $absolute_path = public_path().'/'.$upload_to;
 
         $f->move($absolute_path, $f->getClientOriginalName());
         $pets->image_url = $relative_path;
         $pets->save();
     }
 
     return redirect('pet')
     ->with('ok', 'True')
     ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
 
     }

     public function insert(Request $request) {
        $rules = array(

              'name' => 'required',
              'type_id' => 'required',
        );
  
        $messages = array(
          'required' => 'ข้อมูล :attribute จำเป็นต้องกรอก',
          'numeric' => 'ข้อมูล :attribute ต้องเป็นตัวเลข',
      );
  
      $id = $request->id;
      
      $temp = array(
          'id' => $request->id,
          'name' => $request->name,
          'type_id' => $request->type_id,
      );
  
      $validator = Validator::make($temp, $rules, $messages);
      if($validator->fails()) {
          return redirect('pet/edit/' . $id)
          ->withErrors($validator)
          ->withInput();
      }
              
      $pets = new Pet();
      $pets->name = $request->name;
      $pets->type_id = $request->type_id;
      
      $pets->save();
  
      if($request->hasFile('image'))
      {
          $f = $request->file('image');
          $upload_to = 'upload/images';
  
          $relative_path = $upload_to.'/'.$f->getClientOriginalName();
          $absolute_path = public_path().'/'.$upload_to;
  
          $f->move($absolute_path, $f->getClientOriginalName());
          $pets->image_url = $relative_path;
          $pets->save();
      }
  
      return redirect('pet')
      ->with('ok', 'True')
      ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
  
      }

      public function remove($id) {
        Pet::find($id)->delete();
        return redirect('pet')
        ->with('ok', 'True')
        ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
    
}
