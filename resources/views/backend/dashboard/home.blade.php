@extends('backend.layouts.section')
@section('title',' Home')
@section('main-section')
<style>
  .ProgressBar-percentage.ProgressBar-percentage--count::after {
    content: none;
}
</style>
<div class="container-fluid">
            <div class="row">
              <div class="col-xl-4 col-md-8">
                <div class="card mb-30">
                  <div class="card-body">
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div class="increase">
                        <div class="card-title d-flex align-items-end mb-2">
                          <h2>0<sup>%</sup></h2>
                          <p class="font-14">Increased</p>
                        </div>
                        <h3 class="card-subtitle mb-2">viewers Congratulation!</h3>
                        <p class="font-16">
                         Website Viewers <i class="fas fa-eye"></i>
                        </p>
                      </div>
                      <div class="congratulation-img">
                        <img
                          src="{{asset('assets/backend/assets/img/media/congratulation-img.png')}}"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card area-chart-box mb-30">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="">
                        <h4 class="mb-1">Total Posts</h4>
                      </div>
                      <div class="">
                        <h2 class="text-success">12</h2>
                      </div>
                    </div>
                  </div>
                  <div id="apex_area-chart"></div>
                </div>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card area-chart-box mb-30">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="">
                        <h4 class="mb-1">Total Tags</h4>
                      </div>
                      <div class="">
                        <h2 class="text-success">30</h2>
                      </div>
                    </div>
                  </div>
                  <div id="apex_area2-chart"></div>
                </div>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card area-chart-box mb-30">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div class="">
                      <h4 class="mb-1">Total Categories</h4>
                      <div class="">
                        <h2 class="text-success">25</h2>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div id="apex_area3-chart"></div>
                </div>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card area-chart-box mb-30">
                  <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div class="">
                      <h4 class="mb-1">Total Users</h4>
                      <div class="">
                        <h2 class="text-success">50</h2>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div id="apex_area4-chart"></div>
                </div>
              </div>
            </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6">
                    <div class="card mb-30 progress_1">
                      <div class="card-body">
                        <h4 class="progress-title">Contact Form Submissions</h4>
                        <div class="ProgressBar-wrap position-relative mb-4">
                          <div
                            class="ProgressBar ProgressBar_1"
                            data-progress="data countact count"
                          >
                            <svg
                              class="ProgressBar-contentCircle"
                              viewBox="0 0 200 200"
                            >
                              <circle
                                transform="rotate(135, 100, 100)"
                                class="ProgressBar-background"
                                cx="100"
                                cy="100"
                                r="8"
                              />
                              <circle
                                transform="rotate(135, 100, 100)"
                                class="ProgressBar-circle"
                                cx="100"
                                cy="100"
                                r="85"
                              />
                            </svg>
                            <span class="ProgressBar-percentage--text"
                              >Increase </span
                            >
                            <span
                              class="ProgressBar-percentage ProgressBar-percentage--count"
                            ></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="card mb-30 progress_2">
                      <div class="card-body">
                        <h4 class="progress-title">Total Website Viewers</h4>
                        <div class="ProgressBar-wrap position-relative mb-4">
                          <div
                            class="ProgressBar ProgressBar_2"
                            data-progress="35"
                          >
                            <svg
                              class="ProgressBar-contentCircle"
                              viewBox="0 0 200 200"
                            >
                              <circle
                                transform="rotate(135, 100, 100)"
                                class="ProgressBar-background"
                                cx="100"
                                cy="10000"
                                r="85"
                              />
                              <circle
                                transform="rotate(135, 100, 100)"
                                class="ProgressBar-circle"
                                cx="100"
                                cy="100"
                                r="85"
                              />
                            </svg>
                            <span class="ProgressBar-percentage--text"
                              >Increase</span
                            >
                            <span
                              class="ProgressBar-percentage ProgressBar-percentage--count"
                            ></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="card mb-30 progress_3 mr-0">
                      <div class="card-body">
                        <h4 class="progress-title">Total Blogs</h4>
                        <div class="ProgressBar-wrap position-relative mb-4">
                          <div
                            class="ProgressBar ProgressBar_3"
                            data-progress="data blog count"
                          >
                            <svg
                              class="ProgressBar-contentCircle"
                              viewBox="0 0 200 200"
                            >
                              <circle
                                transform="rotate(135, 100, 100)"
                                class="ProgressBar-background"
                                cx="100"
                                cy="100"
                                r="85"
                                stroke-width="20"
                              />
                              <circle
                                transform="rotate(135, 100, 100)"
                                class="ProgressBar-circle"
                                cx="100"
                                cy="100"
                                r="85"
                                stroke-width="20"
                              />
                            </svg>
                            <!-- <span class="ProgressBar-percentage--text"
                              >Increase </span
                            > -->
                            <span
                              class="ProgressBar-percentage ProgressBar-percentage--count"
                            ></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <div
                      class="d-flex justify-content-start justify-content-sm-between align-items-start align-items-sm-center flex-column flex-sm-row mb-sm-n3"
                    >
                      <div class="title-content mb-4 mb-sm-0">
                        <h4 class="mb-2">Website viewers</h4>
                        <p>Solicitude announcing as to sufficient my</p>
                      </div>
                      <div class="">
                        <ul class="list-inline list-button m-0">
                          <li class="active">2024</li>
                          <li>2025</li>
                          <li>2026</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="apex_line3-chart"></div>
                </div>
              </div>
            </div>
          </div>


@endsection
