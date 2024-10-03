<x-frontend-layout :title="'News-Details'">
    <div class="blog-section style-8 bg-1 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="blog-single-items">
                        <div class="blog-thumb">
                            <img src="{{asset('public'). '/'. $data->cover_photo}}" alt="Blog img">
                        </div>
                        <div class="blog-content">
                            <div class="blog-content-text text-left">
                                <h5>{{$data->title}}</h5>
                                <p>{{$data->description}}</p>
                                
                                <div class="single-blog-social-icon hr-3">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fab fa-reddit"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="widget-items mb-40">
                        <form action="#" method="get">
                            <input type="text" class="src-input-box" placeholder="Search Here" name="s" value=""
                                title="src-input-box">
                            <button class="src-icon" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="widget-items mb-40">

                        <div class="calender-area style-2">
                            <div class="widget-title">
                                <h2>Calender</h2>
                                <span></span>
                            </div>
                            
                            <div id='calendar'></div>
                            <style>
                                .fc-toolbar-chunk{
                                    display: flex;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
          var calendarEl = document.getElementById('calendar');
      
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
          });
      
          calendar.render();
        });
    </script>
      
</x-frontend-layout>