public function up()
{
    Schema::create('categoria_video', function (Blueprint $table) {
        $table->id();
        $table->foreignId('video_id')->constrained()->onDelete('cascade');
        $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
