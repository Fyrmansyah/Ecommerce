@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-red-800 py-5">
    <div class='overflow-x-auto w-full'>
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Designation </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> role </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.imgur.com/siKnZP2.jpg' /> </div>
                            <div>
                                <p> Mira Rodeo </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide"> mirarodeo23@mail.com </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class=""> Software Developer </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide"> Development </p>
                    </td>
                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span> </td>
                    <td class="px-6 py-4 text-center"> Developer </td>
                    <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.imgur.com/siKnZP2.jpg' /> </div>
                            <div>
                                <p> Mira Rodeo </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide"> mirarodeo23@mail.com </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class=""> Software Developer </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide"> Development </p>
                    </td>
                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span> </td>
                    <td class="px-6 py-4 text-center"> Developer </td>
                    <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.imgur.com/siKnZP2.jpg' /> </div>
                            <div>
                                <p> Mira Rodeo </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide"> mirarodeo23@mail.com </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class=""> Software Developer </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide"> Development </p>
                    </td>
                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span> </td>
                    <td class="px-6 py-4 text-center"> Developer </td>
                    <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.imgur.com/siKnZP2.jpg' /> </div>
                            <div>
                                <p> Mira Rodeo </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide"> mirarodeo23@mail.com </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class=""> Software Developer </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide"> Development </p>
                    </td>
                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span> </td>
                    <td class="px-6 py-4 text-center"> Developer </td>
                    <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.imgur.com/siKnZP2.jpg' /> </div>
                            <div>
                                <p> Mira Rodeo </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide"> mirarodeo23@mail.com </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class=""> Software Developer </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide"> Development </p>
                    </td>
                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span> </td>
                    <td class="px-6 py-4 text-center"> Developer </td>
                    <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection