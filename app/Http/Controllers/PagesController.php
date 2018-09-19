<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;

class PagesController extends Controller
{
    
    public function index(){
        $data = Page::all();
        
        return view('admin.pages.index', compact('data'));
    }
    
    public function create(){
        
        $data = Page::where('page_id', 0)
                ->orderBy('title', 'ASC')
                ->get();
        
        if(request()->isMethod('post')){
            $this->validate(request(), [
                'page_id' => 'required|integer',
                'title' => 'required|string|max:191',
                'description' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|mimes:jpeg,bmp,png',
                'header' => 'required|in:0,1',
                'aside' => 'required|in:0,1',
                'footer' => 'required|in:0,1',
                'contact_form' => 'required|in:0,1',
            ]);
            
            $newRow = new Page();
            //$newRow->page_id = request('page_id');
            $newRow->title = request('title');
            $newRow->description = request('description');
            $newRow->content = request('content');
            $newRow->header = request('header');
            $newRow->aside = request('aside');
            $newRow->footer = request('footer');
            $newRow->contact_form = request('contact_form');
            $newRow->active = 0;
            $newRow->deleted = 0;
            
            $image = "";
            
            // check image element in request and accept image
            if(request()->hasFile('image')){
                $file = request('image');
//                echo $file->getClientOriginalName();
//                echo $file->getClientOriginalExtension();
                
                $fileName = str_slug($newRow->title, '-');
                $extension = $file->getClientOriginalExtension();
                $fullFileName =  config('app.seo-image-prefix') . $fileName . "." . $extension;
                
                $file->move(public_path('/uploads/pages'), $fullFileName);
                $image = '/uploads/pages/' . $fullFileName;
                
                // intervention
                //die();
            }
            
            
            $newRow->image = $image;

            $newRow->save();
            
            // set message
            
            session()->flash('message-type', "success");
            session()->flash('message', "Page $newRow->title has been created successfully!!!");
            
            
//            session()->flash('message', [
//                'type' => 'success',
//                'text' => "User $newRow->name has been created successfully!!!"
//            ]);
            
            return redirect( route('pages') );
        }
        
        return view('admin.pages.create', compact('data'));
    }
    
    public function edit(Page $page){
        
//        if( auth()->user()->role != 'administrator' && auth()->user()->id != $user->id ){
//            abort(401, 'Unauthorized action.');
//        }
        
        if(request()->isMethod('post')){
            $this->validate(request(), [
                'title' => 'required|string|max:191',
                'description' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|mimes:jpeg,bmp,png',
                'header' => 'required|in:0,1',
                'aside' => 'required|in:0,1',
                'footer' => 'required|in:0,1',
                'contact_form' => 'required|in:0,1',
            ]);
            
            //$page->page_id = request('page_id');
            $page->title = request('title');
            $page->description = request('description');
            $page->content = request('content');
            $page->header = request('header');
            $page->aside = request('aside');
            $page->footer = request('footer');
            $page->contact_form = request('contact_form');
            $page->active = 0;
            $page->deleted = 0;
            
            $image = "";
            
            // check image element in request and accept image
            if(request()->hasFile('image')){
                $file = request('image');
//                echo $file->getClientOriginalName();
//                echo $file->getClientOriginalExtension();
                
                $fileName = str_slug($page->title, '-');
                $extension = $file->getClientOriginalExtension();
                $fullFileName =  config('app.seo-image-prefix') . $fileName . "." . $extension;
                
                $file->move(public_path('/uploads/pages'), $fullFileName);
                $image = '/uploads/pages/' . $fullFileName;
                
                // intervention
                //die();
            }
            
            
            $page->image = $image;

            $page->save();
            
            // set message
            
            session()->flash('message-type', "success");
            session()->flash('message', "Page $page->title has been edited successfully!!!");
            
            
//            session()->flash('message', [
//                'type' => 'success',
//                'text' => "User $page->name has been created successfully!!!"
//            ]);
            
            return redirect( route('pages') );
        }
        
        return view('admin.pages.edit', compact('page'));
    }
}
