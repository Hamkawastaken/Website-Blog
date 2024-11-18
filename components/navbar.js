export function renderNavbar () {
    const navbar = `
        <nav>
      <div class="bg-white shadow-xl">
        <div class="flex justify-between items-center px-8 md:px-24 py-4">
          <div class="logo flex justify-center items-center gap-x-4">
            <img src="../images/logo.png" class="w-52 hidden md:block" />
            <img src="../images/logo-mobile.png" class="w-12 md:hidden" />
            <div class="icon-search py-1 px-2 rounded-full bg-[#F8F9FA]">
              <a
                href=""
                class="fa-solid fa-magnifying-glass text-[#808385]"
              ></a>
            </div>
          </div>
          <div class="navigasi flex gap-x-4 justify-center items-center">
            <div>
              <a href=""><img src="../images/user1.png" class="w-12 mr-2" /></a>
            </div>
            <div class="icon-bell">
              <a href="" class="fa-solid fa-bell text-2xl text-[#808385]"></a>
            </div>
            <button id="hamburger-menu" class="hamburger-menu">
              <i class="fa-solid fa-bars text-2xl"></i>
            </button>
          </div>
        </div>
      </div>

      <div
        id="menu-accordion"
        class="menu-accordion bg-white px-8 md:px-24 py-4 hidden"
      >
        <ul class="space-y-4">
          <li><a href="" class="text-[#595C5F] text-sm font-bold">HOME</a></li>
          <li>
            <a href="" class="text-[#595C5F] text-sm font-bold relative"
              >BERITA
              <span
                class="absolute -top-2 text-[10px] bg-red-600 text-white px-2 rounded-full"
                >NEW</span
              >
            </a>
          </li>
          <li><a href="" class="text-[#595C5F] text-sm font-bold">AKUN</a></li>
          <li>
            <a href="" class="text-[#595C5F] text-sm font-bold">KONTAK</a>
          </li>
        </ul>
      </div>
    </nav>
    `
    return navbar;
}