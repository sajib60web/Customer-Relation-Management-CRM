@extends('admin.master')

@section('content')
    <div class="container">
        @if(Session::get('message'))
            <h4 class="alert alert-success">{{ Session::get('message') }}</h4>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Email List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr style="text-align: center">
                            <th width="5%">SL NO</th>
                            <th width="10%">Reseller Name</th>
                            <th width="20%">Customer Email</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 0)
                        @foreach($send_mail as $mail_list)
                            <tr style="text-align: center;">
                                <td>{{ $i++ }}</td>
                                <td>{!! $mail_list->reseller_name->name !!}</td>
                                <td>{!! substr($mail_list->email,0,80) !!}...</td>
                                <td>
                                    <a href="{!! url('view/reseller/mail/data') !!}" data-id="{!! $mail_list->id !!}" id="view" class="badge badge-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewResellerMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CustomerName">ReSeller Campaign Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="name"></div>
                    <br/>
                    <div class="send_email"></div>
                    <div class="send_message"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on("click", "#view", function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                var url = $(this).attr("href");
                console.log( id + url );

                $.ajax({
                    url:url,
                    type:"GET",
                    data:{id:id},
                    dataType:"JSON",
                    success:function (response) {
                        if ($.isEmptyObject(response) !=null){
                            $("#viewResellerMail").modal("show");
                            $(".name").text("User_id : " + response.user_id);
                            $(".send_email").text("Send Email : " + response.email);
                            $(".send_message").text("Send Message : " + response.message);
                        }
                    }
                });
            })

        })
    </script>


@endsection