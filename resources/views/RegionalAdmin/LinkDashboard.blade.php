<h3 class="mb-4 text-sm font-bold text-bodydark2 text-white">MENU</h3>
<ul class="mb-6 flex flex-col gap-1.5 ">
    <li>
        <button
            class="{{ Request::is('region') ? 'bg-gray-800' : '' }} w-full hover:bg-gray-700 group relative flex items-center gap-2.5 rounded-md px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 bg-graydark dark:bg-meta-4"><a
                href="region">Regional</a></button>
    </li>
    <li>
        <button
            class="{{ Request::is('region-admin') ? 'bg-gray-800' : '' }} w-full hover:bg-gray-700 group relative flex items-center gap-2.5 rounded-md px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 bg-graydark dark:bg-meta-4"><a
                href="region-admin">Regional Admin</a></button>
    </li>
</ul>
