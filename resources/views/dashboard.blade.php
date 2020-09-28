@extends('adminlte::page')

@section('content')
<div class="container">
  <h2 class="text-center">الطفل اليتيم</h2>
  <div class="row">
    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $families }}</h2>
          <p class="text-muted mb-0">اﻷسر</p>
          <i class="dash-card-icon fas fa-users"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('family-details.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $children }}</h2>
          <p class="text-muted mb-0">اﻷطفال</p>
          <i class="dash-card-icon fas fa-child"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('children.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- *************************************************************************************** --}}
  <hr>
  <h2 class="text-center">الفقراء</h2>
  <div class="row">

    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $poor_families }}</h2>
          <p class="text-muted mb-0">اﻷسر</p>
          <i class="dash-card-icon fas fa-users"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('poor.family-details.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $poor_children }}</h2>
          <p class="text-muted mb-0">اﻷطفال</p>
          <i class="dash-card-icon fas fa-child"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('poor.children.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- *************************************************************************************** --}}
  <hr>
  <h2 class="text-center">المساجد</h2>
  <div class="row">

    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $mosques }}</h2>
          <p class="text-muted mb-0">المساجد</p>
          <i class="dash-card-icon fas fa-mosque"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('mosque.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $workers }}</h2>
          <p class="text-muted mb-0">العمال</p>
          <i class="dash-card-icon fas fa-users"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('worker.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- *************************************************************************************** --}}
  <hr>
  <h2 class="text-center">المعاق</h2>
  <div class="row">

    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $disabled_families }}</h2>
          <p class="text-muted mb-0">اﻷسر</p>
          <i class="dash-card-icon fas fa-users"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('disabled.family-details.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-4 col-lg-5 mr-3">
      <!-- Dashboard Card-->
      <div class="card border-0 overflow-hidden p-4 p-lg-0">
        <div class="card-body p-lg-5">
          <h2 class="h1 mb-0 text-dark">{{ $disabled_children }}</h2>
          <p class="text-muted mb-0">اﻷطفال</p>
          <i class="dash-card-icon fas fa-child"></i>
          <div class="pt-2">
            <a class="btn btn-link p-0 btn-arrow" href="{{ route('disabled.children.index') }}">
              <span>عرض التفاصيل</span>
              <i class="fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
