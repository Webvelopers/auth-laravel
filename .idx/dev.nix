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
      "bradlc.vscode-tailwindcss"
      "esbenp.prettier-vscode"
      "qwtel.sqlite-viewer"
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
