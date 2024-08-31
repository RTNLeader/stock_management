<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Category;
use App\Models\UnitOfMeasure;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function Stock(Request $request) {
        $search_value = $request->query("search");
        $status = Status::all();
        $categories = Category::all();
        $rowLength = $request->query('row_length', 10);
        $stocks = DB::table('stocks')
        ->join('categories', 'stocks.category_id', '=', 'categories.id') 
        ->join('status', 'stocks.status_id', '=', 'status.id') 
        ->join('unit_of_measure', 'stocks.uom_id', '=', 'unit_of_measure.id') 
        ->select('stocks.*', 'categories.name as category_name', 'status.name as status_name', 'unit_of_measure.unit as unit_name')
        ->where('stocks.name', 'like', '%'.$request->input('search').'%')
        ->where('status.name', 'like', '%'.$request->query("status_name").'%')
        ->where('categories.name', 'like', '%'.$request->query("category").'%')
        ->paginate($rowLength);
        return view('page.stocks.index', [
            'stocks'=>$stocks, 
            'search_value'=>$search_value,
            'status' => $status,
            'categories' => $categories
        ]);
    }

    public function Insert() {
        $categories = Category::all();
        $status = Status::all();
        $uoms = UnitOfMeasure::all();


        return view('page.stocks.insert', 
        [
            'categories'=>$categories,
            'status'=>$status,
            'uoms'=>$uoms
        ]);
    }

    public function InsertData(Request $request) {
        $stocks = new Stock();
        $stocks->name = $request->input('name');
        $stocks->category_id = $request->input('category_id');
        $stocks->status_id = $request->input('status_id');
        $stocks->quantity = $request->input('quantity');
        $stocks->uom_id = $request->input('uom_id');

        $stocks->save();
        return redirect()->route('stock')->with('message', 'Stock Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $categories = Category::all();
        $status = Status::all();
        $stock = Stock::find($id);
        $uoms = UnitOfMeasure::all();

        return view('page.stocks.edit', [
            'stock' => $stock, 
            'categories'=>$categories,
            'status'=>$status,
            'uoms'=>$uoms
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $stock = Stock::find($id);
        $stock->name = $request->input('name');
        $stock->category_id = $request->input('category_id');
        $stock->status_id = $request->input('status_id');
        $stock->quantity = $request->input('quantity');
        $stock->uom_id = $request->input('uom_id');
       
        $stock->update();
        
        return redirect()->route('stock')->with('message','Stock Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Stock::destroy($request->id);
            return redirect()->route('stock')->with('message','Delete Successfully');
        } catch(\Exception $e) {
            report($e);
        }
    }

    
}
