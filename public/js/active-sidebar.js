var currPage = window.location.pathname;

if (currPage == "/beranda") {
    document.getElementById("item-beranda").className = "nav-item active";
}

if (currPage == "/karyawan"|currPage == "/pemasok"|currPage == "/konsumen") {
    document.getElementById("item-manage-data").className = "nav-item active";
    document.getElementById("link-manage-data").className = "nav-link";
    // document.getElementById("item-manage-data").setAttribute('aria-expanded', 'true');
    // document.getElementById("item-manage-data").className ="collapse show";
}