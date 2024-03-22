<div class="sl-logo"><a href="{{ route('dashboard') }}">DASHBOARD</a></div>
<div class="sl-sideleft">
  <div class="card mb-4">
    <div class="">
        <div class="">
            <div class="">
                <h4>Hello...</h4>
              </div>
            <h5>I'M, {{ auth()->user()->name }}</h5>
        </div>
    </div>
  </div>

  <div class="sl-sideleft-menu">

     <a href="{{ route('notes') }}" class="sl-menu-link {{ request()->is('note*') ? 'active' : '' }} ">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa-solid fa-note tx-22"></i>
          <span class="menu-item-label">Notes</span>
        </div>
      </a>
      <a href="{{ route('home') }}" class="sl-menu-link">
        <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>

          <span class="menu-item-label">Home</span>
        </div>
      </a>



  </div>

  <br>
</div>
