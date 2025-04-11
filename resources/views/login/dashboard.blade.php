<x-dashboard.layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <h2>Welcome, {{ Auth::user()->name }}</h2>
  <x-alert></x-alert>
</x-dashboard>