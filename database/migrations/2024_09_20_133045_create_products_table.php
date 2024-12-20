 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->double('preco',10,2);
            $table->string('slug');
            $table->string('imagem')->nullable();
            $table->timestamps();
            // Ligar esta tabela com a Categoria e Usuario
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')
            ->on('categories')->onDelete('cascade')
            ->onUpdate('cascade');
            // Ligando com o usuario
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')
            ->on('users')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
