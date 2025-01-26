{ pkgs }: {
  channel = "stable-23.11";
  packages = [
    pkgs.php83
    pkgs.php83Packages.composer
    pkgs.nodejs_20
  ];
  env = { };
  idx = {
    extensions = [
      "bmewburn.vscode-intelephense-client"
      "bradlc.vscode-tailwindcss"
      "esbenp.prettier-vscode"
      "open-southeners.laravel-pint"
      "porifa.laravel-intelephense"
      "qwtel.sqlite-viewer"
      "shufo.vscode-blade-formatter"
    ];
    workspace = {
      onCreate = {
        # default.openFiles = [ "README.md" ];
      };
    };
    # previews = {
      # enable = true;
      # previews = {
        # web = {
          # command = [ "php" "artisan" "serve" "--port" "$PORT" "--host" "0.0.0.0" ];
          # manager = "web";
        # };
      # };
    # };
  };
}
