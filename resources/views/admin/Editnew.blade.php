@extends('admin.admin-panel')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

<table class="table">
        <thead class="thead-dark">
          <tr>
                <th scope="col">Image</th>
            <th scope="col">Arabic Heading</th>
            <th scope="col">English Heading</th>

          </tr>
        </thead>
        <tbody>

            <tr>

                    <th scope="row"><img src="/news pic/{{$blog->img}}" alt="" height="50px" width="50px" ></th>
                    <th scope="row">{{$blog->heading_ar}}</th>
                    <td>{{$blog->heading_en}}</td>



                </tbody>
            </table>
            <form id="regForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                        <h3>Blog:</h3>

                        <!-- One "tab" for each step in the form: -->


                        <div class="tab">Image:
                        <p> <input type="file" placeholder="image"  class="form-control file" name="img" required>
                                </p>

                <!-------------Arabic------------------>
                <div class="tab-pane fade show active" id="Arabic" role="tabpanel" aria-labelledby="Arabic-tab" required>

                        <h5>Arabic Blog:</h5>
                <p> <input type="text" placeholder="heading_ar"  value="{{$blog->heading_ar}}" class="form-control file" name="heading_ar" required>
                        </p>
                        <div class="summernote">
                    <p>
                            <textarea id="summernote" name="p_ar" >
                            {{$blog->p_ar}}
                            </textarea>

                    </p>
                        </div>
              <!--------------------English---------------------->


           

                                      <hr>
                                      <input type="submit" id="sub">
                        </div>
                        </div>
                               </div>
                            </div>

            <!--<textarea class = "form-control" rows = "3" placeholder="info" name="p_en">-->
                        </form>
                        <script>
                            new FroalaEditor('textarea#froala-editor')
                            new FroalaEditor('.selector', {
      imageUploadMethod: 'PUT'
    });

                          </script>

@endsection
