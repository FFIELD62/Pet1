@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') BikeShop | แก้ไขข้อมูลสินค้า @stop {{-- หัวข้อ title html --}}
@section('content')
    {!! Form::open(array (
        'action' => 'App\Http\Controllers\PetController@insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    )) !!}

    <h1>แก้ไขข้อมูลสินค้า</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('pet') }}">หน้าแรก</a></li>
        <li class="active">แก้ไขสินค้า </li>
    </ul>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลสินค้า</strong>
            </div>
        </div>

        <div class="panel-body">
            <table>

                <tr>
                    <td>{{ Form::label('name', 'ชื่อสินค้า ') }}</td>
                    <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
                </tr>

                <tr>
                    <td>{{ Form::label('type_id', 'ประเภทสินค้า ') }}</td>
                    <td>{{ Form::select('type_id', $types, Request::old('type_id'), ['class' => 'form-control']) }}
                    </td>
                </tr>

                <tr>
                    <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                    <td>{{ Form::file('image') }}</td>
                </tr>
                </tr>

            </table>
            <br>
            <div class="panel-footer">
                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection