@include('layouts.header')
@include('layouts.menu')

<!--====== HEADER PART ENDS ======-->
 
<!--====== SEARCH BOX PART START ======-->
@include('layouts.search')

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== SLIDER PART START ======-->
@livewire('course-show',['course'=>$course,'cour'=>$cour,'chapitre'=>$chapitre])
   
   
@include('layouts.footer')
 