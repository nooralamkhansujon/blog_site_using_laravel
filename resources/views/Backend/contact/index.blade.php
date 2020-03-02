@extends('backend.app')
@section('header_title','Message List')

@section('content')
    <div class="row">
         <div class="col-md-12">
               <table class="table table-hover table-responsive-md ">
                 <tr class="bg-success text-light">
                     <th>Sr No</th>
                     <th>Name</th>
                     <th>Email ID</th>
                     <th>Subject</th>
                     <th>message</th>
                     <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($contacts as $contact)
                 <tr>
                     <td>{{ $contact->id }}</td>
                     <td>{{ $contact->name }}</td>
                     <td>{{ $contact->email }}</td>
                     <td>{{ $contact->subject }}</td>
                     <td>{{ $contact->message }}</td>
                     <td>{{ $contact->created_at->format('j M ,Y') }} </td>

                    @if($contact->trashed())
                        <td>
                            <a href="{{route('admincontact.restore',$contact->id)}}" class="btn btn-success btn-sm">restore</a>
                                ||
                            <a href="{{route('admincontact.force_delete',$contact->id)}}" data-id="{{$contact->id}}"
                                class="btn btn-danger btn-sm contact_force_delete">Delete</a>
                            <form action="{{route('admincontact.force_delete',$contact->id)}}"
                                id="contact_force_delete_{{$contact->id}}_form" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @else
                        <td>
                            <a href="{{route('admincontact.delete',$contact->id)}}" data-id="{{$contact->id}}"
                                class="btn btn-danger btn-sm contact_delete">Trashed</a>
                            <form action="{{route('admincontact.delete',$contact->id)}}" method="POST"
                            id="contact_delete_{{$contact->id}}_form" >
                                    @csrf
                                    @method('DELETE')
                            </form>
                        </td>
                    @endif
                 </tr>
                @endforeach
              </table>
         </div>
    </div>

    <script type="text/javascript">
            $(".contact_delete").on('click',function(event){
                event.preventDefault();
                id     = this.dataset.id;
                form   = $(`#contact_delete_${id}_form`);

                if(confirm("Are you sure! You want to Trashed this message")){
                     form.submit();
                }
            });

            $('.contact_force_delete').on('click',function(event){
                  event.preventDefault();
                  id     = this.dataset.id;
                  form   = $(`#contact_delete_${$id}_form`);
                  //console.log(form);

                  if(confirm('Are you sure! you want to Delete This message')){
                      form.submit();
                  }
            });
    </script>
@endsection
