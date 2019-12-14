@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Type</th>
        <th scope="col">Arabic</th>
        <th scope="col">English</th>
      </tr>
    </thead>
    <tbody>

     <!--Establishing company-->
        <tr>
                <td>

                     Establisihing company
                    </td>

            <td> <a href="Establish/ar">
                <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i>
                </button>
            </a>
           </td>

           <td>
                <a href="Establish/en">
               <button type="button" class="btn btn-primary">
               <i class="fas fa-pen"></i>
          </button>
        </a>
        </tr>
        <!--end Establishing company-->

   <!--Residence and nationality-->
        <tr>
                <td>

                Residence and nationality
                    </td>

            <td> <a href="Residence_&_nationality/ar">
                <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i>
                </button>
            </a>
           </td>

           <td>
                <a href="Residence_&_nationality/en">
               <button type="button" class="btn btn-primary">
               <i class="fas fa-pen"></i>
          </button>
        </a>

<!--end Residence and nationality company-->

        <!--------model of message box of delete-->
        <!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Flat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              You Will Delete This Flat
            </div>
            <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary">Delete</button>
             </a>
            </div>
          </div>
        </div> --}}
      </div>


    </tbody>
  </table>







@endsection
