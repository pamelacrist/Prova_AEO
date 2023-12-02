<footer class="bg-body-tertiary py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                Todos os direitos reservados
            </div>
        </div>
    </div>
</footer>
<script>
  document.getElementById('form').addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('svg').style.display = 'block'; // Exibe o SVG
      setTimeout(function() {
          document.getElementById('form').submit(); // Envia o formulário após 1 segundo
      }, 1000);
      // Previne o comportamento padrão do formulário
  });
</script>
</body>

</html>