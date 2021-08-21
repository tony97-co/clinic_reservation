<nav class="sidebar-nav">
    <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                    class="hide-menu">Dashboard</span></a></li>
    
      
    
   
   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
    href="/doctor/{{auth()->user()->id}}/newinterviews" aria-expanded="false"><i class="far fa-calendar"></i><span class="hide-menu"> New Reservations</span></a></li>
    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
        href="/doctor/{{auth()->user()->id}}/pindingInterviews" aria-expanded="false"><i class="far fa-calendar"></i><span class="hide-menu">Pinnded Interviews  </span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
            href="/doctor/{{auth()->user()->id}}/finishedInterviews" aria-expanded="false"><i class="far fa-calendar"></i><span class="hide-menu"> Finished Interviews</span></a></li>

        
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/Examinations" aria-expanded="false"><i class="fas fa-prescription-bottle"></i><span class="hide-menu"> Examinations</span></a></li>
        
    </ul>
</nav>