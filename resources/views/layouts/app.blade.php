<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Vino Cellier') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body x-bind:class="{ 'pas-defilement': ismodalopen }">
   
        <!-- Page Heading -->
        <header class="header_layout">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59.36 71.34"><defs><style>.cls-1{fill:none;}.cls-2{fill:#7e1320;}.cls-3{fill:#fff;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="logo_blanc"><path class="cls-1" d="M35.23,31.48a.84.84,0,0,1-.7,1.22,11.09,11.09,0,0,1-1.41.18c-.72.08-1.45.1-2.16.22a1.23,1.23,0,0,0-1,1.6,3.55,3.55,0,0,0,.4.94c.34.61.72,1.21,1.09,1.83l-2.16.17a2.9,2.9,0,0,0-.89.22q-2.79-6.49-5.06-11.7a14.85,14.85,0,0,1,7.93-2.11,20,20,0,0,1,4.22.42,4.08,4.08,0,0,1-.35.73A5.67,5.67,0,0,0,35,30.77,4.71,4.71,0,0,1,35.23,31.48Z"/><path class="cls-2" d="M20.78,20.35c-.29.12-.56.28-.84.42q-4-9-6-12.93a3.46,3.46,0,0,1-.42-1.46q0-1.47,3.55-2.79c1.2-.43,1.81-.92,1.81-1.47a1.9,1.9,0,0,0-.18-.88,2.58,2.58,0,0,1,.68,0c.37.12.56.51.56,1.2s-.6,1-1.79,1.44q-3.5,1.31-3.49,2.75a3.35,3.35,0,0,0,.42,1.44C16.36,10.57,18.26,14.68,20.78,20.35Z"/><path class="cls-3" d="M19.94,20.77a21.68,21.68,0,0,0-4.18,2.72c-.27.22-.54.43-.81.67q-4.25-8.85-8.2-16a7.34,7.34,0,0,0-5-4C.58,4,0,3.61,0,3.16Q0,1.51,1.53,1.69a58.43,58.43,0,0,0,15.19-.64A6.06,6.06,0,0,1,18.32.9a.76.76,0,0,1,.39.34,1.9,1.9,0,0,1,.18.88c0,.55-.61,1-1.81,1.47q-3.55,1.32-3.55,2.79A3.46,3.46,0,0,0,14,7.84Q15.95,11.77,19.94,20.77Z"/><path class="cls-3" d="M25.21,44.83a6.6,6.6,0,0,0,.48,1.42c.2.45.46.87.72,1.35l-.36,0-.31,0-.72.11q-1.21-4.42-6.75-16.53c.22-.34.45-.65.69-1s.4-.56.62-.83a16.28,16.28,0,0,1,3-2.75c1.54,3.51,3.23,7.43,5.1,11.78A1.77,1.77,0,0,0,28,40.41c.48.69.91,1.42,1.4,2.18-.41.07-.75.11-1.08.19a23.26,23.26,0,0,0-2.35.64A1.16,1.16,0,0,0,25.21,44.83Z"/><path class="cls-2" d="M48.89,58.27a36.92,36.92,0,0,1-1.39,7.92q-.64,1.95-5,3.49a32.63,32.63,0,0,1-10.87,1.66,22.67,22.67,0,0,1-16.9-6.89,23.33,23.33,0,0,1-3.26-4.2,23.72,23.72,0,0,0,2.41,2.93,22.7,22.7,0,0,0,16.9,6.88,32.79,32.79,0,0,0,10.86-1.65q4.34-1.55,5-3.5A36.68,36.68,0,0,0,48,57a1,1,0,0,0,0-.17A1.33,1.33,0,0,1,48.89,58.27Z"/><path class="cls-2" d="M45.13,34.82a1.7,1.7,0,0,1-.84-.09c.05.16.1.32.14.48.19.69.71,1,1.55.89,1.1-.13,1.65-.53,1.65-1.22a83.46,83.46,0,0,0-.35-9.1,2.11,2.11,0,0,0-.85-1.24,83.07,83.07,0,0,1,.35,9.07C46.78,34.29,46.23,34.7,45.13,34.82Z"/><path d="M41.17,27.88c-.1-.13-.2-.24-.3-.35a8.43,8.43,0,0,0-1-1.05c-.21-.17-.43-.33-.66-.49a2.25,2.25,0,0,0,.24-.36,3.19,3.19,0,0,1,.26.26,8,8,0,0,1,.73.87A12.07,12.07,0,0,1,41.17,27.88Z"/><path class="cls-2" d="M35.83,23.52c-.11.31-.21.63-.33.95a20,20,0,0,0-4.22-.42,14.85,14.85,0,0,0-7.93,2.11q2.28,5.2,5.06,11.7a1.56,1.56,0,0,0-.76.63c-1.87-4.35-3.56-8.27-5.1-11.78a16.28,16.28,0,0,0-3,2.75c-.22.27-.42.55-.62.83s-.47.63-.69,1c-2.4,3.72-3.61,8.49-3.61,14.34a26.93,26.93,0,0,0,3.17,13.48c.12.21.25.42.38.62-.29-.39-.56-.79-.82-1.21a26.42,26.42,0,0,1-3.58-14.17q0-9,3.76-14.59c.22-.32.46-.62.7-.93s.29-.42.46-.61a15.32,15.32,0,0,1,3.2-2.91c.26-.18.53-.36.8-.52a14.92,14.92,0,0,1,7.7-2A17.55,17.55,0,0,1,35.83,23.52Z"/><path d="M45.7,23.36a12.8,12.8,0,0,0-3.57-1.95l-.42-.15.34-.65C44.32,21.59,45.54,22.5,45.7,23.36Z"/><path d="M47.32,55.59a1.92,1.92,0,0,0-.48-.18,1.69,1.69,0,0,0-2.32,1.14Q42.74,62,39.93,64.39c-2,1.67-4.65,2.51-8,2.51A15.94,15.94,0,0,1,19,60.75c-.27-.34-.52-.7-.77-1s-.26-.41-.38-.62c.15.2.29.41.45.6a15.94,15.94,0,0,0,12.9,6.15q5.1,0,8-2.5t4.59-7.85a1.7,1.7,0,0,1,2.32-1.14A1.38,1.38,0,0,1,47.32,55.59Z"/><path d="M38,19.28l-.43.84a37.56,37.56,0,0,0-6.91-.59,22.18,22.18,0,0,0-9.32,2c-.29.13-.57.28-.85.42a22.59,22.59,0,0,0-4.13,2.74c-.27.22-.54.45-.8.69-.47.43-.93.86-1.38,1.33q-7.08,7.4-7.08,18.56A25.8,25.8,0,0,0,10.66,59,25.42,25.42,0,0,1,6.35,44.18q0-11.16,7.08-18.57c.5-.51,1-1,1.52-1.45.27-.24.54-.45.81-.67a21.68,21.68,0,0,1,4.18-2.72c.28-.14.55-.3.84-.42a22.14,22.14,0,0,1,9.14-1.88A36.26,36.26,0,0,1,38,19.28Z"/><path class="cls-3" d="M46.78,33.6c0,.69-.55,1.09-1.65,1.22a1.7,1.7,0,0,1-.84-.09,1.13,1.13,0,0,1-.71-.8l-.09-.3a24.32,24.32,0,0,0-2.32-5.75,12.07,12.07,0,0,0-.74-1.12,8,8,0,0,0-.73-.87,3.19,3.19,0,0,0-.26-.26h0l.1-.17,1.74-3.35.43-.84.42.15a12.8,12.8,0,0,1,3.57,1.95,1.88,1.88,0,0,1,.72,1.14.06.06,0,0,1,0,0A83,83,0,0,1,46.78,33.6Z"/><path class="cls-3" d="M48,57a36.68,36.68,0,0,1-1.39,7.92q-.65,1.95-5,3.5a32.79,32.79,0,0,1-10.86,1.65,22.7,22.7,0,0,1-16.9-6.88,23.72,23.72,0,0,1-2.41-2.93c-.29-.41-.57-.82-.84-1.25a25.8,25.8,0,0,1-3.6-13.76q0-11.16,7.08-18.56c.45-.47.91-.9,1.38-1.33.26-.24.53-.47.8-.69a22.59,22.59,0,0,1,4.13-2.74c.28-.14.56-.29.85-.42a22.18,22.18,0,0,1,9.32-2,37.56,37.56,0,0,1,6.91.59c-.19.35-.37.7-.55,1.05-.28.53-.55,1.07-.84,1.61a.08.08,0,0,1,0,0c-.11.23-.2.46-.29.7a17.55,17.55,0,0,0-5.4-.75,14.92,14.92,0,0,0-7.7,2c-.27.16-.54.34-.8.52a15.32,15.32,0,0,0-3.2,2.91c-.17.19-.31.41-.46.61s-.48.61-.7.93q-3.75,5.64-3.76,14.59a26.42,26.42,0,0,0,3.58,14.17c.26.42.53.82.82,1.21s.5.71.77,1a15.94,15.94,0,0,0,12.9,6.15c3.4,0,6.09-.84,8.05-2.51s3.4-4.21,4.59-7.84a1.69,1.69,0,0,1,2.32-1.14,1.92,1.92,0,0,1,.48.18A1.31,1.31,0,0,1,48,56.82,1,1,0,0,1,48,57Z"/><path d="M42.23,13.07c-.54,1-1.08,2.08-1.63,3.13l-1.72,3.31-.41.79-.52,1c-.32.61-.63,1.23-1,1.84l0,.08a3.52,3.52,0,0,0-.18.4.36.36,0,0,1,0,.09.49.49,0,0,1,0,.11c0,.11-.07.22-.11.34l0,.08-.16.45a5.22,5.22,0,0,1-.4.87,5.67,5.67,0,0,0-.19,5.57,4.71,4.71,0,0,1,.27.71,1.07,1.07,0,0,1,0,.73.88.88,0,0,1-.7.49,12.21,12.21,0,0,1-1.37.18H34l-.92.08c-.41,0-.82.07-1.22.14a1.2,1.2,0,0,0-.89.64h0a1.2,1.2,0,0,0-.12.66.25.25,0,0,0,0,.08.74.74,0,0,0,0,.21,4.09,4.09,0,0,0,.4.94c.09.17.2.34.3.51l.54.9,0,0,.18.3,0,0,0,.05h-.07L30.15,38a2.29,2.29,0,0,0-1.43.56s-.06.08-.09.11a.05.05,0,0,0,0,0,1.27,1.27,0,0,0-.2.36,0,0,0,0,1,0,0,1.64,1.64,0,0,0,0,.55,2.43,2.43,0,0,0,.47,1.12l.18.28c.3.45.6.92.9,1.4l0,0c.07.11.13.22.2.32l0,0,.08.13h-.11c-.36.06-.67.1-1,.18a23.26,23.26,0,0,0-2.35.64,1.09,1.09,0,0,0-.69.7v0a1.38,1.38,0,0,0-.05.46v.1s0,.08,0,.13a6.6,6.6,0,0,0,.48,1.42,8.87,8.87,0,0,0,.45.86,0,0,0,0,0,0,0l.11.2v0a.56.56,0,0,0,.05.08s0,0,0,0l.05.1h0a.05.05,0,0,1,0,0l-.62.07-.3.05h-.1c-.35,0-.69.11-1,.18l-.27.06a1.14,1.14,0,0,0-.7.54l0,0a1.07,1.07,0,0,0-.08.84,5,5,0,0,0,.37.77c.08.37.15.74.23,1.12a7.84,7.84,0,0,1-1.45-2.26A1.13,1.13,0,0,1,24,48a8.08,8.08,0,0,1,1-.19l.72-.11.31,0,.36,0c-.26-.48-.52-.9-.72-1.35a6.6,6.6,0,0,1-.48-1.42A1.16,1.16,0,0,1,26,43.42a23.26,23.26,0,0,1,2.35-.64c.33-.08.67-.12,1.08-.19-.49-.76-.92-1.49-1.4-2.18a1.77,1.77,0,0,1-.33-1.92,1.56,1.56,0,0,1,.76-.63,2.9,2.9,0,0,1,.89-.22l2.16-.17c-.37-.62-.75-1.22-1.09-1.83a3.55,3.55,0,0,1-.4-.94,1.23,1.23,0,0,1,1-1.6c.71-.12,1.44-.14,2.16-.22a11.09,11.09,0,0,0,1.41-.18.84.84,0,0,0,.7-1.22,4.71,4.71,0,0,0-.27-.71,5.67,5.67,0,0,1,.19-5.57,4.08,4.08,0,0,0,.35-.73c.12-.32.22-.64.33-.95s.18-.47.29-.7a.08.08,0,0,0,0,0c.29-.54.56-1.08.84-1.61.18-.35.36-.7.55-1.05l.43-.84,1.79-3.45,1.74-3.36.4.33a.1.1,0,0,1,0,0Z"/><path d="M36.4.43a2.54,2.54,0,0,0-2.15.5A4.64,4.64,0,0,0,32.31,4.7,2.6,2.6,0,0,0,33,6.58a2.68,2.68,0,0,0,.07.27,2.52,2.52,0,0,1-1.59-2.52A4.6,4.6,0,0,1,33.4.57,2.5,2.5,0,0,1,36.4.43Z"/><path class="cls-2" d="M42.46,12.62a0,0,0,0,1,0,0l0,.08-.18.36-.29-.23a.1.1,0,0,0,0,0l-.4-.33c-.52-.43-1.05-.85-1.56-1.29s-1-.91-1.47-1.36a4.56,4.56,0,0,0-2.54-1.17l-.87-.15a2.58,2.58,0,0,1-2-1.65A2.68,2.68,0,0,1,33,6.58a3,3,0,0,0,.47.4,3.13,3.13,0,0,0,.95.4l.07,0q.44.09.87.15a4.62,4.62,0,0,1,.82.18,4.52,4.52,0,0,1,1.72,1l.06,0,0,0c.46.43.9.88,1.39,1.29C40.36,10.93,41.4,11.76,42.46,12.62Z"/><path class="cls-2" d="M33.91,40.28c-.75.08-1.51.07-2.26.1-.93,0-1.16.19-.9.83-.13-.23-.26-.46-.38-.69a2.13,2.13,0,0,1-.18-.38s0,0,0,0a1.06,1.06,0,0,1-.11-.39v0c0-.32.31-.42,1-.44s1.51,0,2.26-.1,1-.42.87-.94a7.39,7.39,0,0,1,.42.66C35,39.66,34.77,40.18,33.91,40.28Z"/><path class="cls-2" d="M59.36,14.64a4.64,4.64,0,0,1-2,3.91A2.57,2.57,0,0,1,54,18.36a4.44,4.44,0,0,1-.38-.37,5.62,5.62,0,0,0-3.46-1.9c-1.69-.36-4.94-1.31-5-1.37l-.24.46-2.83,5.43-.34.65-.43.84-1.74,3.35-.1.17h0a2.25,2.25,0,0,1-.24.36,5.77,5.77,0,0,0-.9,1.33c-.18.49-.41,1-.58,1.44a3.36,3.36,0,0,0,.09,2.51,7.75,7.75,0,0,1,.52,1.61,2,2,0,0,1-1.56,2.5,17.64,17.64,0,0,1-2.2.3c-.35,0-.71.06-1,.13S33,36,33,36.27a6,6,0,0,1-.47-.76h0v0a.55.55,0,0,1,0-.53.1.1,0,0,1,0,0,.62.62,0,0,1,.39-.2c.34-.07.7-.08,1.05-.13a17.64,17.64,0,0,0,2.2-.29,2.71,2.71,0,0,0,.67-.29l.09-.05a1.89,1.89,0,0,0,.83-1.43,2.13,2.13,0,0,0,0-.27,4,4,0,0,0,0-.47,8.31,8.31,0,0,0-.52-1.6c0-.08,0-.15-.07-.23l-.09-.26a3.32,3.32,0,0,1,.06-2c.18-.49.41-.95.59-1.44a1.83,1.83,0,0,1,.26-.5l.05-.07a2.35,2.35,0,0,1,.19-.25l.1-.13.06-.07.23-.29.19-.29.06-.09,1.41-2.72.47-.9.36-.68c1-2,2-3.92,3-5.88a.59.59,0,0,0,0-.08l.1-.2.24-.46c.06,0,1.11.35,2.32.69.94.26,2,.53,2.73.68a8,8,0,0,1,1.12.32,5.44,5.44,0,0,1,1.84,1.08,5.9,5.9,0,0,1,.5.5,2.65,2.65,0,0,0,.38.37,2.55,2.55,0,0,0,.38.29l.2.11a2.52,2.52,0,0,0,2.73-.18l0,0a4.67,4.67,0,0,0,2-3.92,3.19,3.19,0,0,0-.08-.63A2.47,2.47,0,0,1,59.36,14.64Z"/><path class="cls-2" d="M31.38,45.24c-.72.23-1.45.41-2.19.6l-1.33.31c.32.69.56,1.24.82,1.78.09.19.19.37.28.56a1.1,1.1,0,0,1-.67,1.7,5.81,5.81,0,0,1-1.25.28c-.45.07-.9.1-1.44.16.17.85.34,1.64.51,2.5a7.9,7.9,0,0,1-1.42-2.19c.14.2.29.4.44.59l.29.36.11.13,0-.15-.24-1.15a2.38,2.38,0,0,0-.05-.26v0c0-.11,0-.23-.07-.34v0c0-.13-.05-.26-.08-.4l0-.14.39,0c.37,0,.72-.06,1.05-.12a5.53,5.53,0,0,0,1.22-.27h0l.11-.06L28,49l.09-.06a1,1,0,0,0,.37-.36l.07-.12a1.39,1.39,0,0,0-.13-1c-.08-.19-.19-.37-.27-.55s-.27-.59-.42-.9h0l-.26-.56v0l-.13-.3c.5-.11.92-.2,1.33-.31.73-.19,1.47-.36,2.19-.59a2.52,2.52,0,0,0,.33-.13l.09,0a1.11,1.11,0,0,0,.31-.24l.07-.1a1.11,1.11,0,0,0-.11-1l0-.09q.35.59.63,1.2C32.45,44.56,32.26,45,31.38,45.24Z"/><path class="cls-2" d="M54,17.65l-.2-.11.1,0,0,0Z"/><path class="cls-3" d="M58.78,13.53a4.67,4.67,0,0,1-2,3.92l0,0a2.52,2.52,0,0,1-2.73.18l-.08-.07,0,0-.1,0a2.55,2.55,0,0,1-.38-.29,2.65,2.65,0,0,1-.38-.37,5.9,5.9,0,0,0-.5-.5A5.44,5.44,0,0,0,50.7,15.3,8,8,0,0,0,49.58,15c-.74-.15-1.79-.42-2.73-.68-1.21-.34-2.26-.65-2.32-.69l-.24.46-.1.2a.59.59,0,0,1,0,.08c-1,2-2,3.92-3,5.88l-.36.68-.47.9-1.41,2.72-.06.09-.19.29-.23.29-.06.07-.1.13a2.35,2.35,0,0,0-.19.25l-.05.07a1.83,1.83,0,0,0-.26.5c-.18.49-.41,1-.59,1.44a3.32,3.32,0,0,0-.06,2l.09.26c0,.08,0,.15.07.23a8.31,8.31,0,0,1,.52,1.6,4,4,0,0,1,0,.47,2.13,2.13,0,0,1,0,.27A1.89,1.89,0,0,1,37,33.94l-.09.05a2.71,2.71,0,0,1-.67.29,17.64,17.64,0,0,1-2.2.29c-.35,0-.71.06-1.05.13a.62.62,0,0,0-.39.2.1.1,0,0,0,0,0,.55.55,0,0,0,0,.53v0h0a6,6,0,0,0,.47.76l0,0c.32.5.69,1,1,1.48a1.58,1.58,0,0,1,.17.45c.11.52-.19.87-.87.94s-1.51.08-2.26.1-1,.12-1,.44v0a1.06,1.06,0,0,0,.11.39s0,0,0,0a2.13,2.13,0,0,0,.18.38c.12.23.25.46.38.69s.38.71.56,1.07l.09.17a.41.41,0,0,1,.05.09l0,.09a1.11,1.11,0,0,1,.11,1l-.07.1a1.11,1.11,0,0,1-.31.24l-.09,0a2.52,2.52,0,0,1-.33.13c-.72.23-1.46.4-2.19.59-.41.11-.83.2-1.33.31l.13.3v0l.26.56h0c.15.31.28.61.42.9s.19.36.27.55a1.39,1.39,0,0,1,.13,1l-.07.12a1,1,0,0,1-.37.36L28,49l-.15.07-.11.06h0a5.53,5.53,0,0,1-1.22.27c-.33.06-.68.09-1.05.12l-.39,0,0,.14c0,.14.05.27.08.4v0c0,.11.05.23.07.34v0a2.38,2.38,0,0,1,.05.26l.24,1.15,0,.15-.11-.13-.29-.36c-.15-.19-.3-.39-.44-.59s-.16-.26-.24-.4a5,5,0,0,1-.37-.77,1.07,1.07,0,0,1,.08-.84l0,0a1.14,1.14,0,0,1,.7-.54l.27-.06c.34-.07.68-.13,1-.18h.1l.3-.05.62-.07a.05.05,0,0,0,0,0h0l-.05-.1s0,0,0,0a.56.56,0,0,1-.05-.08v0L27,47.5a0,0,0,0,1,0,0,8.87,8.87,0,0,1-.45-.86,6.6,6.6,0,0,1-.48-1.42c0-.05,0-.09,0-.13V45a1.38,1.38,0,0,1,.05-.46v0a1.09,1.09,0,0,1,.69-.7,23.26,23.26,0,0,1,2.35-.64c.3-.08.61-.12,1-.18h.11l-.08-.13,0,0c-.07-.1-.13-.21-.2-.32l0,0c-.3-.48-.6-1-.9-1.4l-.18-.28a2.43,2.43,0,0,1-.47-1.12,1.64,1.64,0,0,1,0-.55,0,0,0,0,0,0,0,1.27,1.27,0,0,1,.2-.36.05.05,0,0,1,0,0s.05-.08.09-.11A2.29,2.29,0,0,1,30.15,38l2.09-.16h.07l0-.05,0,0-.18-.3,0,0-.54-.9c-.1-.17-.21-.34-.3-.51a4.09,4.09,0,0,1-.4-.94.74.74,0,0,1,0-.21.25.25,0,0,1,0-.08,1.2,1.2,0,0,1,.12-.66h0a1.2,1.2,0,0,1,.89-.64c.4-.07.81-.11,1.22-.14l.92-.08H34a12.21,12.21,0,0,0,1.37-.18.88.88,0,0,0,.7-.49,1.07,1.07,0,0,0,0-.73,4.71,4.71,0,0,0-.27-.71A5.67,5.67,0,0,1,36,25.57a5.22,5.22,0,0,0,.4-.87l.16-.45,0-.08c0-.12.07-.23.11-.34a.49.49,0,0,0,0-.11.36.36,0,0,0,0-.09,3.52,3.52,0,0,1,.18-.4l0-.08c.33-.61.64-1.23,1-1.84l.52-1,.41-.79L40.6,16.2c.55-1,1.09-2.11,1.63-3.13l.18-.36,0-.08a0,0,0,0,0,0,0c-1.06-.86-2.1-1.69-3.11-2.54-.49-.41-.93-.86-1.39-1.29l0,0-.06,0a4.52,4.52,0,0,0-1.72-1,4.62,4.62,0,0,0-.82-.18q-.44-.06-.87-.15l-.07,0a3.13,3.13,0,0,1-.95-.4,3,3,0,0,1-.47-.4,2.6,2.6,0,0,1-.67-1.88A4.64,4.64,0,0,1,34.25.93,2.54,2.54,0,0,1,36.4.43a2.88,2.88,0,0,1,1.23.65,4.94,4.94,0,0,1,.57.55,4.78,4.78,0,0,0,1.33,1.06,6.27,6.27,0,0,0,1.64.59c1.43.32,2.87.62,4.26,1.07.29.09.58.19.86.3a17.21,17.21,0,0,1,5.43,3.6L53.05,9.5a5,5,0,0,0,1.05.74,5.09,5.09,0,0,0,1.75.58,6.68,6.68,0,0,1,.89.18,3.38,3.38,0,0,1,.48.16A2.34,2.34,0,0,1,58.7,12.9,3.19,3.19,0,0,1,58.78,13.53Z"/></g></g></svg></span>
        </header>

        <!-- Page Content -->
        <main>
            @yield("content")
        </main>


        <footer>
            <nav>
                @if(Auth::check())
    
                <a href="{{ route('utilisateur.show', Auth::user()->id)}}"><img src="{{asset('assets/img/icon_PW2/profile_icon.svg')}}" alt=""></a>
                <a href="{{ route('bouteille.create')}}"><img src="{{asset('assets/img/icon_PW2/btl-icon.svg')}}" alt=""></a>
                <a href="{{ route('dashboard')}}"><img src="{{asset('assets/img/icon_PW2/accueil.svg')}}" alt=""></a>
                @endif
            </nav>
        </footer>    
    </body>
</html>
