<x-header />
<!-- Register Section Begin -->
<section class="contact spad">
    <div class="container">
        <h3 class="col-lg-6 mx-auto text-center">Login</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                {!! Form::open(array('route' => 'login.user','role'=>"form")) !!}
                    <div class="form-group col-lg-12 {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('email', 'Email ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::text('email',$country->email ?? null,array('class' => 'form-control','placeholder' => 'Enter Email')) !!}
                        <span class="form-text text-muted">{!! $errors->first('email', '<p class="text-danger">:message</p>') !!}</span>
                    </div>
                    <div class="form-group col-lg-12 {{ $errors->has('password') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('password', 'Password ' .'<span class="text-danger">*</span> ')) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}
                        <span class="form-text text-muted">{!! $errors->first('password', '<p class="text-danger">:message</p>') !!}</span>
                    </div> 
                    <div class="col-lg-12">
                        <button type="submit" class="site-btn">Sign In</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<!-- Register Section End -->
<x-footer />