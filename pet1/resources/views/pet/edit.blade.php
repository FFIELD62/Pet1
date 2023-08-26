@extends('layouts.master')
@section('title', 'Petshop | พี่น้องสัตว์เลี้ยง')
@section('content')
    <h1>แก้ไขข้อมูลสัตว์เลี้ยง</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('pet') }}">ข้อมูลสัตว์เลี้ยง</a></li>
        <li class="active">แก้ไขข้อมูลสัตว์เลี้ยง</li>
    </ul>

    {!! Form::model($pets, [
        'action' => 'App\Http\Controllers\PetController@update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <input type="hidden" name="id" value="{{ $pets->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลสัตว์เลี้ยง</strong>
            </div>
        </div>

    <div class="panel-body">
        <table>

            @if ($pets->image_url)
              <tr>
                <td><strong>รูปภาพเดิม</strong></td>
                <td><img src="{{ $pets->image_url }}" alt="" width="100"></td>
                </tr> 
            @endif

            <tr>
                <td>{{ Form::label('id', 'รหัส') }} </td>
                <td>{{ Form::text('id', $pets->id, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('name', 'ชื่อสัตว์เลี้ยง') }} </td>
                <td>{{ Form::text('name', $pets->name, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('type_id', 'ประเภทสัตว์เลี้ยง') }} </td>
                <td>{{ Form::select('type_id', $types, $pets->type_id, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

            @if ($pets->image_url)
            <tr>
                <td>{{ Form::label('image', 'รูปภาพสินค้า ') }}</td>
                <td><img src="{{ $pets->image_url }}" alt="" width="100"></td>
            </tr>
            @endif


        </table>
    </div>
    <div class="panel-footer">
        <button type="reset" class="btn btn-danger">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>

</div>
</div>



    {!! Form::close() !!}
@endsection