@extends('me') @section('content')

<style>
   ::-webkit-input-placeholder { /* Edge */
  color: #183B4F !important;
}
</style>
    <div class="content--boxed-sm">
            @if(session()->has('uploaderror'))
            <div style="padding: 0%">
                 <div class="alert alert-danger" role="alert">
                         Upload Error! Please try again.
                     </div>
             </div>
           @endif 

          @if(session()->has('equalmail'))
           <div style="padding: 0%">
                    <div class="alert alert-warning" role="alert">
                        This E-Mail already exists!
                    </div>
            </div>
          @endif 
          @if(session()->has('successid'))
           <div style="padding: 0%">
                <div class="alert alert-success" role="alert">
                        Your Front of ID Document has been uploaded.
                    </div>
            </div>
          @endif 
          @if(session()->has('success2fa_enabled'))
           <div style="padding: 0%">
                <div class="alert alert-success" role="alert">
                        Your 2FA Authenticator was enabled.
                    </div>
            </div>
          @endif 
          @if(session()->has('error2fa'))
           <div style="padding: 0%">
                <div class="alert alert-danger" role="alert">
                        Your 6 digit code was incorrect. Please try again.
                    </div>
            </div>
          @endif 
          @if(session()->has('success2fa_disabled'))
           <div style="padding: 0%">
                <div class="alert alert-success" role="alert">
                        Your 2FA Authenticator was disabled.
                    </div>
            </div>
          @endif 
          @if(session()->has('successid_verse'))
           <div style="padding: 0%">
                <div class="alert alert-success" role="alert">
                        Your ID Verse of Document has been uploaded.
                    </div>
            </div>
          @endif 
          @if(session()->has('successaddress'))
           <div style="padding: 0%">
                <div class="alert alert-success" role="alert">
                        Your Address Document has been uploaded.
                    </div>
            </div>
          @endif 
           @if(session()->has('success'))
           <div style="padding: 0%">
                    <div class="alert alert-success" role="alert">
                        Your password has been changed.
                    </div>
          @endif   
           @if(session()->has('resetsuccess'))
           <div style="padding: 0%">
                    <div class="alert alert-success" role="alert">
                        Your upload has been reseted.
                    </div>
          @endif   
          @if(session()->has('equal'))
          <div style="padding: 0%">
                    <div class="alert alert-warning" role="alert">
                        Your new password cannot be the same!
                    </div>
                </div>
          @endif
          @if(session()->has('fail'))
          <div style="padding: 0%">
                    <div class="alert alert-danger" role="alert">
                        Your old password is not correct.
                    </div>
                </div>
          @endif
          @if(session()->has('mailchanged'))
           <div style="padding: 0%">
                    <div class="alert alert-warning" role="alert">
                         Please verify your inbox to confirm your email alteration.
                    </div>
            </div>
          @endif 
          @if(session()->has('successinfo'))
           <div style="padding: 0%">
                    <div class="alert alert-success" role="alert">
                         Your information has been successfully changed.
                    </div>
            </div>
          @endif


        <header class="content__header">
            <h2>{{ Auth::user()->name }}
                {{ Auth::user()->lastname }}
                <small>{{ Auth::user()->email }}</small>
            </h2>
        </header>

        
      
        <?php 
            // $doc = App\Doc::where('user',Auth::user()->id)->first();
            // $id_doc = $doc->status_id;
            // $address_doc = $doc->status_address;
            // if($id_doc=="accepted" && $address_doc=="accepted"){}else{
        ?>
        <div class="card">
            <div class="action-header action-header--card">

                <div class="widget-past-days__chart ">
                    <p style="font-size:12pt">
                        <a data-toggle="modal" href="#modal--info">Atualizar</a>
                    </p>
                </div>
                <div class="widget-past-days__info">

                    <p style="font-size:12pt; margin-top:10px">
                        Informações da conta</p>
                </div>
            </div>

            <div class="list-group list-group--striped">
                <div class="list-group-item">
                    <div class="widget-past-days__chart ">
                        <p style="font-size:12pt">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="widget-past-days__info">

                        <p style="font-size:12pt; margin-top:10px">Nome</p>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="widget-past-days__chart ">
                        <p style="font-size:12pt">{{ Auth::user()->lastname }}</p>
                    </div>
                    <div class="widget-past-days__info">

                        <p style="font-size:12pt; margin-top:10px">Apelido</p>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="widget-past-days__chart ">
                        <p style="font-size:12pt">{{ Auth::user()->cpf }}</p>
                    </div>
                    <div class="widget-past-days__info">

                        <p style="font-size:12pt; margin-top:10px">CPF</p>
                    </div>
                </div>
               
            </div>
            
        </div>
        <?php// }?>
      

        <!-- Documents  -->
        <?php 
            $doc = App\Doc::where('user',Auth::user()->id)->first();
            $id_doc = $doc->status_id;
            $address_doc = $doc->status_id_verse;
            if(Auth::user()->verified != 1) {
        ?>
       <div style="padding: 0%">
                    <div class="alert alert-warning" role="alert">
                        Allowed extensions are: .JPG, .JPEG, .PNG and .PDF. The max filesize is 4MB. <b><i>(Fields with * are required.)</i></b>
                    </div>
        <div class="card">
            <div class="action-header action-header--card">

                <div class="widget-past-days__chart ">
                
                </div>
                <div class="widget-past-days__info" id="docsto">
                    <p style="font-size:12pt; margin-top:10px;"> <b>Upload de Documento</b> </p>
                </div>
            </div>

            <div class="list-group list-group--striped">
                   <?php 
                        $doc = App\Doc::where('user',Auth::user()->id)->first();
                        $id_doc = $doc->status_id;
                        if($id_doc=="new" || $id_doc=="refused"){
                    ?>
                        <div class="list-group-item">
                            <div class="widget-past-days__chart ">
                                <p style="font-size:12pt"><a data-toggle="modal" href="#modal--file-1">Upload file</a></p>
                            </div>
                            <div class="widget-past-days__info">

                                <p style="font-size:12pt; margin-top:10px">CPF *</p>
                            </div>
                        </div>
                 <?php }else{ ?>
                    <form onsubmit="return ConfirmReset()" action="{{ action('Me\\DashboardController@resetupload')}}" method="POST" enctype="multipart/form-data">
                    <div class="list-group-item" >
                            <div class="widget-past-days__chart"  style="opacity:1">
                                <p style="font-size:12pt">
                               
                                    {{ csrf_field() }}
                                    <input type="text" name="type" value="front_id" hidden>
                                    <button class="btn btn-danger" type="submit"> <i class="zmdi zmdi-refresh"></i> Resetar Upload</button>
                                </p>
                            </div>
                            <div class="widget-past-days__info">

                                <p style="font-size:12pt; margin-top:10px">CPF *</p>
                            </div>
                        </div>
                    </form>
                <?php }
                        $doc = App\Doc::where('user',Auth::user()->id)->first();
                        $id_doc = $doc->status_id_verse;
                        if($id_doc=="new" || $id_doc=="refused"){
                ?>
                     
       
                <?php } ?>
            </div>
            
        </div>

    <?php }?>

    </div>

    <?php 
        $id = Auth::user()->id;
        $doc = Auth::user()->doc;
    ?>
    <!-- Modal Default -->
 <?php $id = Auth::user()->id;?>
  <div class="modal fade" id="modal--info">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Other Profile Info</h4>
                                    </div>
                                    <form onsubmit="return ConfirmDelete()" action="{{ action('Me\\DashboardController@updateinfo')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                    
                                        <input type="text" name="id" value="<?= $id ?>" style="display:none" >
                                        <div class="form-group">
                                            <label style="color:#222" for="">Nome (*)</label>
                                            <input style="color:#222;border-bottom:1px solid #222" type="text" name="name" class="form-control ml-5"  value="{{ Auth::user()->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#222" for="">Apelido (*)</label>
                                            <input style="color:#222;border-bottom:1px solid #222" type="text" name="lastname" class="form-control"  value="{{ Auth::user()->lastname }}" required>
                                        </div>
                                      
                                       
                                        <div class="form-group">
                                            <label style="color:#222" for="">Nascimento</label>
                                            <input style="color:#222;border-bottom:1px solid #222" type="text" name="birth" class="form-control"  value="{{ Auth::user()->birth }}" required >
                                        </div>
                          
                                        <div class="form-group">
                                            <label style="color:#222" for="">CPF (*)</label>
                                            <input style="color:#222;border-bottom:1px solid #222" type="text" name="cpf" class="form-control"  value="{{ Auth::user()->cpf }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-link">Guardar alterações</button>
                                    </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal--email">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Email</h4>
                                    </div>
                                    <form action="{{ action('Me\\DashboardController@updatemail')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                    <div style="padding: 5% 0% 0% 0%;margin-bottom:25px">
                                            <div class="alert alert-danger" role="alert">
                                           Warning! If you change any your email, you will need to verify it again.
                                            </div>
                                            </div>
                                         <input type="text" name="id" value="<?= $id ?>" style="display:none" >
                              
                                         <div class="form-group">
                                            <label style="color:#222" for="">Yor Email Adress</label>
                                            <input style="color:#222;border-bottom:1px solid #222" type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                         </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-link">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                        <div class="modal fade" id="modal--password">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Security</h4>
                                    </div>
                                    <form action="{{ action('Admin\\UserController@updateAuthUserPassword')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <input type="text" name="id" value="<?= $id ?>" style="display:none" >
                                        <div class="form-group">
                                            <label style="color:#222" for="">Password</label>
                                            <input style="color:#222;border-bottom:1px solid #222" type="password" name="current" class="form-control ml-5"  required>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#222" for="">New Password</label>
                                            <input  style="color:#222" id="password" name="password" type="password" pattern="^\S{6,}$"   class="form-control ml-5" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#222" for="">Confirm Password</label>
                                            <input  style="color:#222" id="password_two" name="password_confirmation" type="password"  class="form-control ml-5" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-link">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modal--file-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Upload Front of ID Document</h4>
                                    </div>
                                    <!-- Verify if a document was sent -->
                                    <?php 
                                        $doc2 = App\Doc::where('user',Auth::user()->id)->first();
                                        $id_doc_verify2 = $doc2->status_id;
                       
                                        if($id_doc_verify2=="sent"){
                                            $message = '
                                            <div style="padding: 5% 2% 0% 2%;margin-bottom:-25px">
                                            <div class="alert alert-warning" role="alert">
                                            You have already made an upload, are you sure you want to upload again?
                                            </div>
                                            </div>';
                                        }else{
                                            $message = '';
                                        }
                                    ?>
                                    <form method="POST" onsubmit="return Validate1(this);" action="{{ action('Me\\DocController@updatefileid') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    
                                        <?= $message ?>
                                    <div class="modal-body">
                                        <input type="text" name="id" value="<?= $doc ?>" style="display:none" >
                                        <input type="text" name="user" value="<?= $id ?>" style="display:none" >
                                        <div class="form-group">
                                            <label style="color:#222" for="">Upload File</label>
                                            <input class="form-control findDocumentGeneral" name="doc_id" type="file" id="doc_id"  required>
                                             {!! $errors->first('doc_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-link">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                      
                     
                        <script>
                                var _validFileExtensions = [".jpg", ".jpeg", ".png", ".bmp", ".pdf"];    
                                function Validate1(oForm) {
                                    var file_size = $('#doc_id')[0].files[0].size;
                                    if(file_size>4194304) {
                                    alert("Sorry, the file is too large. the max limit is 4MB.");
                                    return false;
                                    }
                                    var arrInputs = oForm.getElementsByTagName("input");
                                    for (var i = 0; i < arrInputs.length; i++) {
                                        var oInput = arrInputs[i];
                                        if (oInput.type == "file") {
                                            var sFileName = oInput.value;
                                            if (sFileName.length > 0) {
                                                var blnValid = false;
                                                for (var j = 0; j < _validFileExtensions.length; j++) {
                                                    var sCurExtension = _validFileExtensions[j];
                                                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                                        blnValid = true;
                                                        break;
                                                    }
                                                }
                                                
                                                if (!blnValid) {
                                                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                                                    return false;
                                                }
                                            }
                                        }
                                    }
                                
                                    return true;
                                }
                                function Validate2(oForm) {
                                    var file_size = $('#doc_address')[0].files[0].size;
                                    if(file_size>4194304) {
                                    alert("Sorry, the file is too large. the max limit is 4MB.");
                                    return false;
                                    }
                                    var arrInputs = oForm.getElementsByTagName("input");
                                    for (var i = 0; i < arrInputs.length; i++) {
                                        var oInput = arrInputs[i];
                                        if (oInput.type == "file") {
                                            var sFileName = oInput.value;
                                            if (sFileName.length > 0) {
                                                var blnValid = false;
                                                for (var j = 0; j < _validFileExtensions.length; j++) {
                                                    var sCurExtension = _validFileExtensions[j];
                                                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                                        blnValid = true;
                                                        break;
                                                    }
                                                }
                                                
                                                if (!blnValid) {
                                                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                                                  return false;
                                                }
                                            }
                                        }
                                    }
                                
                                    return true;
                                }
                                function Validate3(oForm) {
                                    var file_size = $('#doc_id_verse')[0].files[0].size;
                                    if(file_size>4194304) {
                                    alert("Sorry, the file is too large. the max limit is 4MB.");
                                    return false;
                                    }
                                    var arrInputs = oForm.getElementsByTagName("input");
                                    for (var i = 0; i < arrInputs.length; i++) {
                                        var oInput = arrInputs[i];
                                        if (oInput.type == "file") {
                                            var sFileName = oInput.value;
                                            if (sFileName.length > 0) {
                                                var blnValid = false;
                                                for (var j = 0; j < _validFileExtensions.length; j++) {
                                                    var sCurExtension = _validFileExtensions[j];
                                                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                                        blnValid = true;
                                                        break;
                                                    }
                                                }
                                                
                                                if (!blnValid) {
                                                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                                                  return false;
                                                }
                                            }
                                        }
                                    }
                                
                                    return true;
                                }
                            </script>
                            <script>
                                function ConfirmDelete()
                                {
                                var x = confirm("Are you sure you want to change your data? if you change any of the items marked with (*) you will need to send new documents to verify your account again.");
                                if (x)
                                  return true;
                                else
                                  return false;
                                }
                                function    ConfirmReset()
                                {
                                var x = confirm("Are you sure you want to reset? This field will be reset and you will have to upload your document again.");
                                if (x)
                                  return true;
                                else
                                  return false;
                                }
                              </script>
                    @endsection