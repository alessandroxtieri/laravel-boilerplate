<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" id="search-input" placeholder="INIZIA A SCRIVERE QUI...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ homeRoute() }}" style="padding: 0px;">
                <img src="/images/logo@2x.png" width="180" alt="{{ config('app.name') }}" />
            </a>
        </div>
    </div>
</nav>
<!-- #END# Top Bar -->
