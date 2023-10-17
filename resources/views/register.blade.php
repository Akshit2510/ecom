<x-header />
<!-- Register Section Begin -->
<section class="contact spad">
    <div class="container">
        <h3 class="col-lg-6 mx-auto text-center">Create New Account</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                {!! Form::open(array('route' => 'register.user','role'=>"form",'enctype'=>'multipart/form-data')) !!}
                    <div class="form-group col-lg-12 {{ $errors->has('fullname') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('fullname', 'Full Name ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::text('fullname',null,array('class' => 'form-control','placeholder' => 'Enter Full Name')) !!}
                        <span class="form-text text-muted">{!! $errors->first('fullname', '<p class="text-danger">:message</p>') !!}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('email', 'Email ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::text('email',null,array('class' => 'form-control','placeholder' => 'Enter Email')) !!}
                        <span class="form-text text-muted">{!! $errors->first('email', '<p class="text-danger">:message</p>') !!}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('phone_no') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('phone_no', 'Phone No ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::text('phone_no',null,array('class' => 'form-control','placeholder' => 'Enter Phone No')) !!}
                        <span class="form-text text-muted">{!! $errors->first('phone_no', '<p class="text-danger">:message</p>') !!}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('file') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('file', 'Profile Image ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::file('file',null,array('class' => 'form-control')) !!}
                        <span class="form-text text-muted">{!! $errors->first('file', '<p class="text-danger">:message</p>') !!}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('password') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('password', 'Password ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}
                        <span class="form-text text-muted">{!! $errors->first('password', '<p class="text-danger">:message</p>') !!}</span>
                    </div>                    
                    <div class="col-lg-12">
                        <button type="submit" class="site-btn">Sign Up</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<!-- Register Section End -->
<x-footer />