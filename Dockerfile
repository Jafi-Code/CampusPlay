# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Enable Apache modules commonly needed (e.g., for URL rewriting)
RUN a2enmod rewrite

# Copy all project files into the web server's document root
COPY . /var/www/html/

# Set correct permissions for the web server
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Render will map this automatically)
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]