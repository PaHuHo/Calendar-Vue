<template>
<!-- <div class="p-menubar p-component font-medium">
    <div class="p-menubar-start">
        <img alt="logo" src="img/logo.png" height="40" class="mr-2"/>
    </div>
    <ul class="p-menubar-root-list">
        <li class="p-menuitem">
            <a href="" class="p-menuitem-lick router-link-active router-link-active-exact" >
                <span class="p-menuitem-icon fas fa-home"></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="p-menuitem">
            <a href="" class="p-menuitem-lick router-link-active router-link-active-exact" >
                <span class="p-menuitem-icon fas fa-hand-holding-usd"></span>
                <span>Pricing</span>
            </a>
        </li> <li class="p-menuitem">
            <a href="" class="p-menuitem-lick router-link-active router-link-active-exact" >
                <span class="p-menuitem-icon fas fa-home"></span>
                <span>Dashboard</span>
            </a>
        </li> <li class="p-menuitem">
            <a href="" class="p-menuitem-lick router-link-active router-link-active-exact" >
                <span class="p-menuitem-icon fas fa-home"></span>
                <span>Dashboard</span>
            </a>
        </li>
    </ul>
</div> -->
<div class="nav-bar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid " style="padding-left:0;margin-left: 170px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavCollapse"
                aria-controls="NavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="NavCollapse" style="padding-left: 0;">

                <div class="justify-content-between" style="display: flex;">
                    <ul class="navbar-nav flex">
                        <li class="nav-item d-none d-sm-inline-block">
                            <router-link to="/">Calendar</router-link>
                        </li>
                        
                    </ul>

                    <ul class="navbar-nav flex">
                        <li class="nav-item d-none d-sm-inline-block" style="margin-right: 10px;">
                            <span class="text-white"></span>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <button @click="logout()">Logout</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

</script>

<style>
.nav-bar {
    background: linear-gradient(-90deg, #84cf6a, #16c0b0);
    height: 60px;
    margin-bottom: 25px;
    -webkit-box-shadow: 0px 2px 15px -12px rgba(0, 0, 0, 0.57);
    -moz-box-shadow: 0px 2px 15px -12px rgba(0, 0, 0, 0.57);
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.57);
  }
.p-menubar {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 0.5rem 0.5rem;
    border-radius: 0;
    background-color: var(--surface-0);
    border-bottom: 1px solid var(--surface-300);
    background: #f8f9fa;
    color: #495057;
    border: 1px solid #dee2e6;
}
.font-medium {
    font-weight: 500!important;
}
.p-component, .p-component * {
    box-sizing: border-box;
}
.p-component {
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
    font-size: 1rem;
    font-weight: 400;
}
.mr-2 {
    margin-right: 0.5rem!important;
}
.p-menubar-button {
    display: none;
    cursor: pointer;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    text-decoration: none;
}
.p-menubar ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.p-menubar-root-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}
.p-menubar .p-menuitem {
    font-size: 20px;
    position: relative;
}
.p-menubar .p-menuitem-link.router-link-active-exact {
    background: #eff6ff;
}
.p-menubar .p-menubar-root-list>.p-menuitem>.p-menuitem-link {
    padding: 0.75rem 1.25rem;
    color: #495057;
    border-radius: 6px;
    transition: box-shadow .2s;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}
.p-menubar .p-menuitem-link {
    cursor: pointer;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    text-decoration: none;
    overflow: hidden;
    position: relative;
}
.p-menubar .p-menuitem-link {
    padding: 0.75rem 1.25rem;
    color: #495057;
    border-radius: 0;
    transition: box-shadow .2s;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}
.p-menubar .p-menubar-root-list>.p-menuitem>.p-menuitem-link .p-menuitem-icon {
    color: #6c757d;
    margin-right: 0.5rem;
}
p-menubar .p-menuitem-link .p-menuitem-icon {
    color: #6c757d;
    margin-right: 0.5rem;
}
.p-menubar .p-menuitem-link.router-link-active-exact .p-menuitem-text {
    color: #1d4ed8;
}
.p-menubar .p-menubar-root-list>.p-menuitem>.p-menuitem-link .p-menuitem-text {
    color: #495057;
}
.p-menubar .p-menuitem-link .p-menuitem-text {
    color: #495057;
}
.p-menubar .p-menuitem-text {
    line-height: 1;
}
</style>