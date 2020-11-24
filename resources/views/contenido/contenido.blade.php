@extends("principal")
@section("contenido")

@if(Auth::check())

<template v-if="menu==1">

<autor></autor>
        
</template>

<template v-if="menu==2">

<categoria></categoria>
        
</template>

<template v-if="menu==3">

<editorial></editorial>
        
</template>

<template v-if="menu==4">

<idioma></idioma>
        
</template>

<template v-if="menu==5">

<pais></pais>
        
</template>

<template v-if="menu==6">

<libro></libro>
        
</template>

<template v-if="menu==7">

<solicitud></solicitud>
        
</template>

<template v-if="menu==8">

<user></user>
        
</template>
   
@endif





@endsection