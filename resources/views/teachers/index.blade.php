@extends('layouts.main')
@section('header')
@include('layouts.res')
@endsection
@section('title')
Welcome To CRUD Guru
@endsection
@section('breadcrumb')
Table Guru
@endsection

@section('content')

@include('layouts.message')

<div class="card">
    <div class="card-header">
       <a href="{{ url('/teachers/create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card-body">
        <table id="table-teachers" class="display responsive nowrap" style="width:100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat Tinggal</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Mata Pelajaran</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($teachers as $t)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->city }}</td>
                    <td>{{ $t->pob }}</td>
                    <td>{{ $t->dob }}</td>
                    <td>{{ $t->subject }}</td>
                    <td>{{ $t->created_at }}</td>
                    <td>
                        
                            <a href="{{ url('/teachers/edit/'.$t->id) }}" class="btn btn-success">Edit</a> 
                            <button type="button" class="btn btn-danger" data-coreui-toggle="modal" data-coreui-target="#hapus" data-coreui-name="{{ $t->name }}" data-coreui-url="{{ url('teachers/delete/'.$t->id) }}">Delete</button>
                        
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" id="form-hapus">
            @csrf
            @method('delete')
            <div class="modal-body">
                <p id="tanya"></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('footer')
@include('layouts.res-js')
<script>
$(document).ready( function () {
    $('#table-teachers').DataTable();
        responsive: true
} );
</script>

<script>
const hapus = document.getElementById('hapus')
hapus.addEventListener('show.coreui.modal', event => {
  const button = event.relatedTarget
  const name = button.getAttribute('data-coreui-name')
  const url = button.getAttribute('data-coreui-url')
  const title = hapus.querySelector('.modal-title')
  const tanya = hapus.querySelector('.modal-body #tanya')
  const formHapus = hapus.querySelector('#form-hapus')

  title.textContent = 'Hapus ' + name 
  tanya.textContent = 'Yakin Akan Menghapus ' + name + ' ?'
  formHapus.action = url
})
</script>
@endsection

