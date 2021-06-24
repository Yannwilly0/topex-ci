<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
       
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$data['texts']['school_name']->text}} - ADMIN</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <link rel="stylesheet" href="https://unpkg.com/fullcalendar@5.3.2/main.min.css">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mail.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>



        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand " style="background-color: #fff;">
            <a class="h3 text-secondary ml-5 text-decoration-none" href="{{route('admin.administration')}}">MENU</a>
            <button class="btn  btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars fa-2x"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0" style="background-color: #fff;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-secondary" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}  <i class="fa fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                    <a class="dropdown-item" href="{{ route('admin.password.update.get') }}"><i class="fa fa-lock" aria-hidden="true"></i> mot de passe</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <i class="fa fa-user    "></i> {{ __(' Se deconnecter') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                        <div class="sb-sidenav-menu-heading">COMMUNICATION</div>  
                            <a class="nav-link {{ $data['nav'] == 'messages' ? 'active' : '' }}" href="{{route('admin.inbox')}}">
                                <div class="sb-nav-link-icon"><img src="https://img.icons8.com/office/30/000000/new-message.png"/></div>
                                        Messages<span class="badge badge-danger ml-2"> {{$data['unread']}}</span>
                            </a>
                            
                            
                            <div class="sb-sidenav-menu-heading">GESTION D'UTILISATEURS</div>  
                            <a class="nav-link {{ $data['nav'] == 'utilisateurs' ? 'active' : '' }}" href="{{ route('admin.utilisateurs') }}">
                                <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/officel/30/000000/select-users.png"/> </div>
                                        Utilisateurs
                            </a>
                            <a class="nav-link {{ $data['nav'] == 'students' ? 'active' : '' }}" href="{{ route('admin.etudiants') }}">
                                <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/color/30/000000/student-male.png"/></div>
                                        Elèves
                            </a>
                            <a class="nav-link {{ $data['nav'] == 'enseignants' ? 'active' : '' }}" href="{{ route('admin.enseignants') }}">
                                <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/emoji/30/000000/briefcase-emoji.png"/> </div>
                                        Enseignants
                            </a>

                            <a class="nav-link collapsed {{ $data['nav'] == 'passwords' ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseComptes" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon text-danger"><img src="https://img.icons8.com/fluent/30/000000/password-window.png"/></div>
                                                    Comptes
                                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseComptes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            
                                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapseLayouts">
                                                <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/cute-clipart/20/000000/forgot-password.png"/> </div>
                                                Mots de passe
                                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                            </a>
                                            <div class="collapse" id="collapsePassword" aria-labelledby="headingOne" >
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link" href="{{ route('admin.accounts.passwords.parents') }}"> <img src="https://img.icons8.com/fluent/20/000000/user-folder.png" class="mr-2"/> Parents</a>
                                                    <a class="nav-link" href="{{route('admin.accounts.passwords.students')}}"> <img src="https://img.icons8.com/color/20/000000/student-male.png" class="mr-2"/> Élèves</a>
                                                    <a class="nav-link" href="{{route('admin.accounts.passwords.teachers')}}"> <img src="https://img.icons8.com/emoji/20/000000/briefcase-emoji.png" class="mr-2"/> Enseignants</a>
                                                </nav>
                                            </div>
                                            
                                        </nav>
                                    </div>
                            <div class="sb-sidenav-menu-heading">GESTION ACADEMIQUE</div>
                                   
                                     <!-- Années Académiques -->
                                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcademicyears" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/officel/30/000000/plus-1year.png"/> </div>
                                        Années Académiques 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseAcademicyears" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
        
                                        <a class="nav-link" href="{{ route('admin.academic_year.create') }}"> <img src="https://img.icons8.com/office/20/000000/add-property.png" class="mr-2"/> Ajouter</a>
                                        <a class="nav-link" href="{{route('admin.academic_year.list')}}"> <img src="https://img.icons8.com/pastel-glyph/20/000000/list.png" class="mr-2"/> Liste</a>
                                        <a class="nav-link" href="{{route('admin.academic_year.current')}}"> <img src="https://img.icons8.com/flat-round/20/000000/list.png" class="mr-2"/> En cours</a>
                                        
                                    </nav>
                                </div>


                                     <!-- statistics -->
                                <a class="nav-link collapsed text-danger" href="#" data-toggle="collapse" data-target="#collapseStatistics" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/fluent/30/000000/statistics-report.png"/> </div>
                                        Statistiques
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseStatistics" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('admin.classes_levels') }}"> <img src="https://img.icons8.com/cotton/20/000000/university-building--v1.png" class="mr-2"/> Niveaux</a>
                                        <a class="nav-link" href="{{ route('admin.classes_list') }}"> <img src="https://img.icons8.com/dusk/20/000000/school.png" class="mr-2"/> Classes</a>
                                        <a class="nav-link" href="{{route('admin.niveaux')}}"> <img src="https://img.icons8.com/color/20/000000/student-male.png" class="mr-2"/> Élèves</a>
                                        <a class="nav-link" href="{{route('admin.niveaux')}}"> <img src="https://img.icons8.com/emoji/20/000000/briefcase-emoji.png" class="mr-2"/> Enseignants</a>
                                    </nav>
                                </div>
                                    <!--classes -->
                                    <a class="nav-link collapsed {{ $data['nav'] == 'classes' ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/color/30/000000/classroom.png"/></div>
                                                    Classes
                                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseClasses" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link {{ $data['sub_nav'] == 'new_class' ? 'active' : '' }}" href="{{ route('admin.classes_levels') }}"> <img src="https://img.icons8.com/color/20/000000/add-property.png" class="mr-2"/> Nouvelle classe</a>
                                            <a class="nav-link {{ $data['sub_nav'] == 'classes_list' ? 'active' : '' }}" href="{{ route('admin.classes_list') }}"><img src="https://img.icons8.com/cute-clipart/20/000000/list.png" class="mr-2"/> Liste des classes</a>
                                            <a class="nav-link {{ $data['sub_nav'] == 'classes_niveaux' ? 'active' : '' }}" href="{{route('admin.niveaux')}}"> <img src="https://img.icons8.com/color/20/000000/class.png" class="mr-2"/> Niveaux</a>
                                        </nav>
                                    </div>
                                    <!--matières -->
                                    <a class="nav-link collapsed {{ $data['nav'] == 'subjects' ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseMatieres" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/color/30/000000/teaching.png"/></div>
                                                    Matières
                                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseMatieres" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link {{ $data['sub_nav'] == 'new_subject' ? 'active' : '' }}" href="{{route('admin.create_subject')}}"> <img src="https://img.icons8.com/color/20/000000/add-property.png" class="mr-2"/> Nouvelle matière</a>
                                            <a class="nav-link {{ $data['sub_nav'] == 'subjects_list' ? 'active' : '' }}" href="{{route('admin.subjects')}}"><img src="https://img.icons8.com/cute-clipart/20/000000/list.png" class="mr-2"/> Liste des matières</a>
                                            <a class="nav-link {{ $data['sub_nav'] == 'subjects_niveaux' ? 'active' : '' }}" href="{{route('admin.subjects_levels')}}"><img src="https://img.icons8.com/color/20/000000/class.png" class="mr-2"/> Niveaux</a>
                                        </nav>
                                    </div>
                                     <a class="nav-link {{ $data['nav'] == 'evaluations' ? 'active' : '' }}" href="{{route('admin.evaluations')}}">
                                        <div class="sb-nav-link-icon"><img src="https://img.icons8.com/doodle/30/000000/calendar.png"/></div>
                                        Calendriers
                                    </a>
                                    <a class="nav-link {{ $data['nav'] == 'bulletins' ? 'active' : '' }}" href="{{route('admin.bulletins.etudiants')}}">
                                        <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/dusk/30/000000/exam.png"/> </div>
                                        Bulletins
                                    </a>
                                    <a class="nav-link text-danger" href="tables.html">
                                        <div class="sb-nav-link-icon"><img src="https://img.icons8.com/fluent/30/000000/law.png"/></div>
                                        Resultats
                                    </a>
                                    <a class="nav-link {{ $data['nav'] == 'archives' ? 'active' : '' }}" href="{{route('admin.archives')}}">
                                        <div class="sb-nav-link-icon text-danger"> <img src="https://img.icons8.com/fluent/30/000000/archive-folder.png"/> </div>
                                        Archives
                                    </a>
                                     <a class="nav-link {{ $data['nav'] == 'salles' ? 'active' : '' }}" href="{{route('admin.salles')}}">
                                        <div class="sb-nav-link-icon text-danger"><img src="https://img.icons8.com/doodle/30/000000/cottage.png"/></div>
                                        Salles
                                    </a>
                                    
                                    <!--
                                     <a class="nav-link text-danger" href="">
                                        <div class="sb-nav-link-icon text-danger"><img src="https://img.icons8.com/fluent/30/000000/parse-resumes.png"/></div>
                                        profils
                                    </a>
                                    <a class="nav-link text-danger" href="tables.html">
                                        <div class="sb-nav-link-icon text-danger"><img src="https://img.icons8.com/fluent/30/000000/law.png"/></div>
                                        Conseil de classe
                                    </a>
                                -->
                                     <a class="nav-link collapsed {{ $data['nav'] == 'media' ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon text-danger"><img src="https://img.icons8.com/cute-clipart/30/000000/add-image.png"/> </div>
                                                    Media
                                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseMedia" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link {{ $data['sub_nav'] == 'text' ? 'active' : '' }}" href="{{route('admin.media.textes')}}"> <img src="https://img.icons8.com/ultraviolet/20/000000/text-color.png" class="mr-2"/>Textes</a>
                                            <a class="nav-link {{ $data['sub_nav'] == 'image' ? 'active' : '' }}" href="{{route('admin.media.images')}}"><img src="https://img.icons8.com/dusk/20/000000/image-file.png" class="mr-2"/> Images</a>
                                            <a class="nav-link" href="layout-sidenav-light.html"> <img src="https://img.icons8.com/color/20/000000/signature.png" class="mr-2"/> Signatures</a>
                                            
                                        </nav>
                                    </div>

                                    <!--import excel -->
                                    
                                <a class="nav-link collapsed {{ $data['nav'] == 'import' ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseImports" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon text-danger"> <img src="https://img.icons8.com/color/30/000000/ms-excel.png"/> </div>
                                            Importer
                                    <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseImports" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"> <img src="https://img.icons8.com/officel/30/000000/select-users.png"/> </div>
                                       Utilisateurs
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseusers" aria-labelledby="headingOne" >
                                        <nav class="sb-sidenav-menu-nested nav">
                                            
                                            <a class="nav-link {{ $data['sub_nav'] == 'student' ? 'active' : '' }}" href="{{route('admin.etudiants.import')}}"> <img src="https://img.icons8.com/color/20/000000/student-male.png" class="mr-2"/> Élèves</a>
                                            <!--<a class="nav-link {{ $data['sub_nav'] == 'teacher' ? 'active' : '' }}" href="#"> <img src="https://img.icons8.com/emoji/20/000000/briefcase-emoji.png" class="mr-2"/> Enseignants</a>-->
                                           
                                        </nav>
                                    </div>
                                    <a class="nav-link {{ $data['sub_nav'] == 'marks' ? 'active' : '' }}" href="{{route('admin.import.marks')}}"><img src="https://img.icons8.com/fluent/20/000000/statistics-report.png" class="mr-2"/> Moyennes</a>
                                    <a class="nav-link {{ $data['sub_nav'] == 'marks' ? 'active' : '' }}" href="{{route('admin.import.decisions')}}"><img src="https://img.icons8.com/plasticine/30/000000/law.png" class="mr-2"/> Decisions</a>
                                </nav>
                            </div>
                               
                            <!-- export excel -->
                            <a class="nav-link collapsed {{ $data['nav'] == 'export' ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseImport" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-danger"> <img src="https://img.icons8.com/dusk/30/000000/ms-excel.png"/> </div>
                                        Exporter
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseImport" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                               
                                <a class="nav-link" href="{{route('admin.etudiants.export')}}"> <img src="https://img.icons8.com/fluent/20/000000/statistics-report.png" class="mr-2"/> Fiches de classes</a>
                                <a class="nav-link" href="{{route('admin.etudiants.fiches.export')}}"> <img src="https://img.icons8.com/wired/20/000000/list.png" class="mr-2"/> Fiches annuelles</a>
                                
                               
                                
                            </nav>
                        </div>
                            
                            </div>
                            
                            <div class="sb-sidenav-footer">
                                <div class="small">Logged in as:</div>
                                {{ Auth::user()->name }} 
                            </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="mt-3 m-2">
                        <div class="container">
                            
                            
                            <img src="https://img.icons8.com/ios/50/000000/circled-left-2.png" onclick="window.history.go(-1)"/>
                            <img src="https://img.icons8.com/ios/50/000000/circled-right-2.png" onclick="window.history.go(+1)"/>
                            @include('layouts.messages')
                        </div>
                        @yield('content') 
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; {{$data['texts']['school_name']->text}}  2021</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
        
        
        <script src="{{ asset('js/script.js') }}"></script>
        
     
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/fullcalendar@5.3.2/main.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
       




    </body>
    <script type="text/javascript">
        $(document).ready(function () {
           
            tinymce.init({ selector:'textarea', height : "300" });
    });
    
  
    
    </script>
</html>
