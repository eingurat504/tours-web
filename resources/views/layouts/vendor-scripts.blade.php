<script>
    let app = '{{ env('APP_URL') }}';
</script>

  <!-- Script for handling sidebar toggle -->
  <script defer>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('-translate-x-full');
    }
  </script>
@yield('script')