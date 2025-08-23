# Copilot Instructions

<!-- Use this file to provide workspace-specific custom instructions to Copilot. For more details, visit https://code.visualstudio.com/docs/copilot/copilot-customization#_use-a-githubcopilotinstructionsmd-file -->

## Project Context

This is a fullstack Laravel project for a product profile website with the following features:

### Frontend Structure
- **Navigation**: Home, Product, Recipe, Blogs, Contact Us
- **Hidden Login Page**: Accessible but not shown in main navigation
- **Multi-language Support**: Indonesian (default) and English
- **Responsive Design**: Following Figma design specifications

### Backend Features
- **Product Management**: Admin can add/edit/delete products
- **Recipe Management**: Admin can add/edit/delete recipes
- **Blog Management**: Admin can add/edit/delete blog posts
- **Language Management**: Support for both static content and API-based translation

### Language Implementation Strategy
- **Static Content**: Pre-written content during development stored in language files (id/en)
- **Dynamic Content**: User-generated content (products, recipes, blogs) translated via API during production

### Technical Guidelines
- Use Laravel's built-in localization features
- Implement middleware for language switching
- Follow Laravel naming conventions and best practices
- Use Blade templating engine for views
- Implement proper authentication for admin features
- Use resource controllers for CRUD operations
- Follow RESTful API principles for backend endpoints

### Code Style
- Follow PSR-12 coding standards
- Use meaningful variable and function names in English
- Comment complex logic in English
- Use Laravel's helper functions and facades appropriately
