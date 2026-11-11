PHP - Обязательное расширение. Подсветка PHP, диагностика, автодополнение, переход к определениям и интеграция с Xdebug.
Laravel (Official) - Официальная интеграция с Laravel LSP. Понимание маршрутов, Blade, Laravel API, диагностика и навигация по коду.
Blade
Emmet

composer global require laravel/lsp


npm install -g blade-formatter

# .zed/settings.json



{
  "file_types": {
    "Blade": ["*.blade.php"]
  },
  "languages": {
    "PHP": {
      "tab_size": 4,
      "format_on_save": "on",
      "formatter": {
        "external": {
          "command": "/home/ninjamax/projects/learning_livewire/vendor/bin/pint",
          "arguments": [
            "-",
            "--stdin-filename",
            "{buffer_path}"
          ]
        }
      }
    },
    "Blade": {
      "tab_size": 4,
      "format_on_save": "on",
      "language_servers": [
        "tailwindcss-language-server",
        "..."
      ],
      "formatter": {
        "external": {
          "command": "blade-formatter",
          "arguments": ["--stdin"]
        }
      }
    },
    "JavaScript": {
      "format_on_save": "on",
      "formatter": "prettier"
    },
    "TypeScript": {
      "format_on_save": "on",
      "formatter": "prettier"
    },
    "CSS": {
      "format_on_save": "on",
      "formatter": "prettier",
      "language_servers": [
        "tailwindcss-intellisense-css",
        "!vscode-css-language-server",
        "..."
      ]
    },
    "HTML": {
      "format_on_save": "on",
      "formatter": "prettier"
    },
    "JSON": {
      "format_on_save": "on",
      "formatter": "prettier"
    }
  },
  "lsp": {
    "tailwindcss-language-server": {
      "settings": {
        "includeLanguages": {
          "php": "html",
          "blade": "html"
        },
        "experimental": {
          "classRegex": [
            "class=\"([^\"]*)\"",
            "class='([^']*)'",
            "class=\\\"([^\\\"]*)\\\"",
            "@class\\(\\[([^\\]]*)\\]\\)"
          ]
        }
      }
    }
  }
}
