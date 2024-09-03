@extends('admin.layouts.layout')

@section('title','All Widgets')

@section('content')
    <section class="content-header">                    
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="toggle-container">
            <div class="tab-trigger">
                <ul>
                    <li><a>General Setting</a></li>
                    <li><a>SMTP Email Setting</a></li>
                    <li><a>Layout Setting</a></li>
                    <li><a>AddThis, Facebook & Disqus Settings</a></li>
                    <li><a>Other Settings</a></li>
                </ul>
            </div>
    </section>
    <section class="tab-container">
        {{-- General Setting section --}}
        <div class="tab-content-box">
            <form action="{{ route('setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="" class="form-label">Timezone</label>
                    </div>
                    <div class="col-md-9">
                        <select name="timezone" id="" class="form-select w-full form-control">
                            <option value="dhaka">Dhaka</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="" class="form-label">Site Style</label></div>
                    <div class="col-md-9">
                        <select name="site_style" id="" class="form-select w-full form-control">
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="orange">Orange</option>
                            <option value="pink">Pink</option>
                            <option value="lime">Lime</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="site_logo" class="form-label">Site Logo</label></div>
                    <div class="col-md-9 d-flex"><img src="{{ asset('/admin-asset/img/logo.png') }}" alt="" style="width: 150px;"><input name="site_logo" type="file" class="form-control w-full"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="favicon" class="form-label">Favicon</label></div>
                    <div class="col-md-9 d-flex"><img src="{{ asset('/admin-asset/img/favicon.png') }}" alt="" style="width: 40px;"><input name="favicon" type="file" class="form-control w-full"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="site_name" class="form-label">Site Name</label></div>
                    <div class="col-md-9"><input type="text" name="site_name" class="form-control w-full"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="" class="form-label">Site Email</label></div>
                    <div class="col-md-9"><input type="email" name="site_email" class="form-control w-full"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="site_description" class="form-label">Site Description</label></div>
                    <div class="col-md-9"><textarea name="site_description" id="" class="form-control"></textarea></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="copyright_text" class="form-label">Copyright Text</label></div>
                    <div class="col-md-9"><textarea name="copyright_text" id="" class="form-control"></textarea></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3"><label for="envato_buyer-details" class="form-label">Envato Buyer Details</label></div>
                    <div class="col-md-9"><textarea name="envato_buyer-details" id="" cols="30" rows="" class="form-control"></textarea></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="envato_username" class="form-label">Envato Username</label></div>
                    <div class="col-md-9"><input type="text" class="form-control w-full" name="envato_username"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="envato_purchase_code" class="form-label">Envato Purchase Code</label></div>
                    <div class="col-md-9"><input type="text" class="form-control w-full" name="envato_purchase_code"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
                </div>
            </form>
        </div>
        {{-- General Setting section end --}}

        {{-- SMTP Email Setting section --}}
        <div class="tab-content-box">
           <form action="{{ route('setting.save') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="row mb-4">
               <div class="col-md-3"><label for="mail_host" class="form-label">HOST</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full" name="mail_host"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="mail_from_address" class="form-label">Email</label></div>
               <div class="col-md-9"><input type="email" class="form-control w-full" name="mail_from_address"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="app_password" class="form-label">Password</label></div>
               <div class="col-md-9"><input type="password" class="form-control w-full" name="app_password"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="mail_port" class="form-label">Port</label></div>
               <div class="col-md-9"><input type="number" class="form-control w-full" name="mail_port"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="mail_encription" class="form-label">Encryption</label></div>
               <div class="col-md-9">
               	<select class="form-control" name="mail_encription">
               		<option value="SSL">SSL</option>
               		<option value="TLS">TLS</option>
               	</select>
               </div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- SMTP Email Setting section end --}}

        {{-- Layout Setting section --}}
        <div class="tab-content-box">
           <form action="">
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Background Image</label></div>
               <div class="col-md-9 d-flex"><img src=""  alt=""><input type="file" class="form-control w-50"></div>
            </div>
            <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Home Slider</label></div>
               <div class="col-md-9">
               	<select name="" id="" class="form-control w-50">
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               	</select>
               </div>
            </div>
            <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Home Page Layout</label></div>
               <div class="col-md-9">
               	<select name="" id="" class="form-control w-50">
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               	</select>
               </div>
            </div>
           	<div class="row mb-4">
              <div class="col-md-3"><label for="" class="form-label">Category Page Layout</label></div>
              <div class="col-md-9">
               	<select name="" id="" class="form-control w-50">
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               	</select>
              </div>
           	</div>
           	<div class="row mb-4">
              <div class="col-md-3"><label for="" class="form-label">Tags Page Layout</label></div>
              <div class="col-md-9">
               	<select name="" id="" class="form-control w-50">
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               	</select>
              </div>
           	</div>
           	<div class="row mb-4">
              <div class="col-md-3"><label for="" class="form-label">Search Page Layout</label></div>
              <div class="col-md-9">
               	<select name="" id="" class="form-control w-50">
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               	</select>
              </div>
           	</div>
           	<div class="row mb-4">
              <div class="col-md-3"><label for="" class="form-label">Single Post Layout</label></div>
              <div class="col-md-9">
               	<select name="" id="" class="form-control w-50">
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               		<option value="">Dummy Title</option>
               	</select>
              </div>
           	</div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- Layout Setting section end --}}

        {{-- AddThis, Facebook & Disqus Settings section --}}
        <div class="tab-content-box">
           <form action="{{ route('setting.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row mb-4">
               <div class="col-md-3"><label for="addthis_code" class="form-label">AddThis Code</label></div>
               <div class="col-md-9"><textarea name="addthis_code" id="" class="form-control"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="disqus_comment_code" class="form-label">Disqus Comment Code</label></div>
               <div class="col-md-9"><textarea name="disqus_comment_code" id="" class="form-control"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="facebook_comment_code" class="form-label">Facebook Comment Code</label></div>
               <div class="col-md-9"><textarea name="facebook_comment_code" id="" class="form-control"></textarea></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- AddThis, Facebook & Disqus Settings section end --}}

        {{-- Other Settings section --}}
        <div class="tab-content-box">
           <form  action="{{ route('setting.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row mb-4">
               <div class="col-md-3"><label for="header_code" class="form-label">Header Code</label></div>
               <div class="col-md-9"><textarea name="header_code" id="" class="form-control" placeholder="You may want to some html/css/js code to header"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="footer_code" class="form-label">Footer Code</label></div>
               <div class="col-md-9"><textarea name="footer_code" id="" class="form-control" placeholder="You may want to some html/css/js code to footer"></textarea></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- Other Settings section end --}}



    </section>
@endsection

@section('customJs')
    <script>
        $('.tab-trigger ul li').on('click',function(){
            let index = $(this).index();

            $('.tab-trigger ul li').removeClass('active');
            $(this).addClass('active');

            $('.tab-content-box').hide();
            $('.tab-content-box').eq(index).show();

            localStorage.setItem('settingCount',index);
        });
            var getSettingCount = localStorage.getItem('settingCount');
            $('.tab-trigger ul li').eq(getSettingCount).addClass('active');
            $('.tab-content-box').eq(getSettingCount).show();
    </script>
@endsection
