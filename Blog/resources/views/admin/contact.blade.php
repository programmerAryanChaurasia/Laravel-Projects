@extends('admin.layout')
@section('title','Contact List')
@section('content')

{{-- <div class="right_col" role="main"> --}}
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Contact <small>All Contact Related table</small></h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row" style="display: block">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped table-bordered jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th width="3%" class="column-title">ID</th>
                      <th width="10%" class="column-title">Name</th>
                      <th width="12%" class="column-title">Email</th>
                      <th width="12%" class="column-title">Mobile No.</th>
                      <th width="53%" class="column-title">Message</th>
                      <th width="10%" class="column-title">Added Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($contactData as $item)
                      <tr class="even pointer">
                        <td class="">{{ $item->id }}</td>
                        <td class="">{{ $item->name }}</td>
                        <td class="">{{ $item->email }}</td>
                        <td class="">{{ $item->mobile }}</td>
                        <td class="">{{ $item->message }}</td>
                        <td class="">{{ $item->added_on }}</td>
                      </tr> 
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 {{--  </div> --}}

@endsection