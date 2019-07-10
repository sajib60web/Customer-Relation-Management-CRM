@extends('admin.master')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryPage">
            Add Page
        </button>
        <br/>
        <br/>
        @if($message = Session::get('message'))
            <p class="alert alert-success" style="text-align: center;">{{$message}}</p>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Category Table</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr style="text-align: center;">
                            <th>SL NO</th>
                            <th>Page Name</th>
                            <th>Description</th>
                            <th width="20%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody id="show_by_group">
                        @php($i = 0)
                            @foreach($show_category_page as $category_page)
                                <tr style="text-align: center;">
                                    <td>{{ $i++ }}</td>
                                    <td>{!! $category_page->name !!}</td>
                                    <td>{!! substr($category_page->description,0,50) !!}....</td>
                                    <td>{!! $category_page->status == 1 ? 'Active' : 'Inactive' !!}</td>
                                    <td width="15%">
                                        @if($category_page->status == 1)
                                            <a href="{{ url('/active/status/'.$category_page->id) }}" class="badge badge-success">Active</a>
                                        @else
                                            <a href="{{ url('/inactive/status/'.$category_page->id) }}" class="badge badge-warning">Inactive</a>
                                        @endif
                                            <a href="{{ url('/delete/page/'.$category_page->id) }}" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="categoryPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Page</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/save/page') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Add Page Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Page Name">
                                <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" required id="editor1" class="form-control" placeholder="Enter Your Message"></textarea>
                                <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Script--}}
    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
