@extends('layouts.app')

@section('content')
<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contacto
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">Contacto</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3622.108625168481!2d-107.4123061!3d24.7917337!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x27d2fdde5d62d36c!2sCocina+Chuyita!5e0!3m2!1ses!2smx!4v1448793473001" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Detalles de Contacto</h3>
                <p>
                    Río Suchiate 1673<br>Fracc. Los Pinos,80128 Culiacán Rosales, Sin.<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Teléfono">T</abbr>: (123) 456-7890</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Correo Electrónico">E</abbr>: <a href="mailto:contacto@NobleGrain.com">contacto@corralesTernera.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Horario">H</abbr>: Lunes - Viernes: 9:00 AM a 5:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://mx.linkedin.com/"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/?lang=es"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Mandanos un mensaje</h3>
                {!! Form::open(['route' => 'mail.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label ('Nombre completo:') !!}
                    {!! Form::input('text','nombre', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese su nombre completo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label ('Teléfono:') !!}
                    {!! Form::input('text', 'telefono', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese su número telefónico']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label ('Correo electrónico:') !!}
                    {!! Form::input('text', 'correo', null, ['class'=> 'form-control', 'placeholder' => 'Ingrese su correo electrónico']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label ('Mensaje:') !!}
                    {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su mensaje', 'style' => 'overflow:auto;resize:none']) !!}
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                {!! Form::submit('Enviar',['class' => 'btn btn-primary fa fa-send']) !!}

                {!! Form::close() !!}
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
@section('scripts')
        <!-- Scripts -->

        <!-- Bootstrap Validation JavaScript-->
        {!! Html::script('assets/js/jqBootstrapValidation.js') !!}

        <!-- Contacto -->
        {!! Html::script('assets/js/contact_me.js') !!}
@endsection