@extends('maintenance::layouts.pages.main.tabbed')

@section('tab.head.content')
    <li class="active"><a href="#tab-profile" data-toggle="tab">Profile</a></li>
    <li><a href="#tab-history" data-toggle="tab">History</a></li>
    <li><a href="#tab-meters" data-toggle="tab">Meters & Readings</a></li>
    <li><a href="#tab-calendar" data-toggle="tab">Calendar</a></li>
    <li><a href="#tab-work-orders" data-toggle="tab">Work Orders</a></li>
    <li><a href="#tab-images" data-toggle="tab">Images</a></li>
    <li><a href="#tab-manuals" data-toggle="tab">Manuals</a></li>
@stop

@section('tab.body.content')

    <div class="tab-pane active" id="tab-profile">

        <div class="row">

            <div class="col-md-12">

                <div class="pull-left">
                    {!! $asset->viewer()->btnEvents() !!}

                    {!! $asset->viewer()->btnAddImages() !!}

                    {!! $asset->viewer()->btnViewImages() !!}
                </div>

                <div class="pull-right">
                    {!! $asset->viewer()->btnEdit() !!}

                    {!!$asset->viewer()->btnDelete() !!}
                </div>
            </div>

            <div class="col-md-6">
                <h2>Profile</h2>

                {!! $asset->viewer()->profile() !!}
            </div>

            <div class="col-md-6">
                <h2>Images</h2>

                {!! $asset->viewer()->slideshow() !!}
            </div>
        </div>

    </div>

    <div class="tab-pane" id="tab-meters">

        {!! $asset->viewer()->btnAddMeter() !!}

        <h2>Meters & Readings</h2>

        {!! $asset->viewer()->meters() !!}

    </div>

    <div class="tab-pane" id="tab-history">
        {!! $asset->viewer()->history() !!}
    </div>

    <div class="tab-pane" id="tab-calendar">

        <h2>Calendar</h2>

        {!! $asset->viewer()->calendar() !!}
    </div>

    <div class="tab-pane" id="tab-work-orders">

        <h2>Work Orders</h2>

        {!! $asset->viewer()->workOrders($workOrders) !!}

    </div>

    <div class="tab-pane" id="tab-images">

        {!! $asset->viewer()->btnAddImages() !!}

        <h2>Images</h2>

        {!! $asset->viewer()->images() !!}

    </div>

    <div class="tab-pane" id="tab-manuals">

        {!! $asset->viewer()->btnAddManuals() !!}

        <h2>Manuals</h2>

        {!! $asset->viewer()->manuals() !!}

    </div>

@stop
