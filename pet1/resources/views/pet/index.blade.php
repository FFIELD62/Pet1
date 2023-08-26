@extends("layouts.master")
@section('title') PetShop | รายการสัตว์ @stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
    <div class="panel-title"><strong>รายการ</strong></div>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('pet/search') }}" method="post" class="form-inline">
            <a href="{{ URL::to('pet/edit') }}" class="btn btn-success pull-right">เพิ่มสัตว์</a>
                <form action="{{ URL::to('pet/search') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <input type="text" name="q" class="form-control" placeholder="...">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>
    </div>

<div class="container">

    

    <table class="table table-bordered bs_table">
    <thead>
        <tr>
            <th>รูปสินค้า </th>
            <th>ชื่อสินค้า </th>
            <th>ประเภท</th>
            <th>การทํางาน</th>
        </tr>
    </thead>

    @foreach($pets as $p)

    <tbody>
        <tr>
            <td><img src="/{{ $p->image_url }}" alt="" width="100"></td>

            <td>{{ $p->name }}</td>
            <td>{{ $p->type->name }}</td>

            <td class="bs-price"> 
                <a href="{{ URL::to('pet/edit/' . $p->id) }}" class="btn btn-info"><i
                    class="fa fa-edit"></i> แก้ไข</a>
                    <a href="#" class="btn btn-danger btn-delete" id-delete="{{$p->id}}">
                        <i class="fa fa-trash"></i> ลบ</a>
            </td>

        </tr>@endforeach

    </tbody>

    </table>
    <div class="panel-footer">
    </div>

</div>
<script>
    $(document).ready(function () {
        $('.btn-delete').click(function () {
            var id = $(this).attr('id-delete');
            if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                window.location.href = '/pet/remove/' + id;
            }
        });
    });

</script>

@endsection