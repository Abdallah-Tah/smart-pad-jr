export default () => ({
    canvas: null,
    ctx: null,
    isDrawing: false,
    color: "#FF6B6B", // Start with a fun red color
    lineWidth: 8, // Bigger default brush for kids
    isEraser: false,
    lastX: 0,
    lastY: 0,
    hasDrawn: false, // Track if user has started drawing
    undoStack: [], // Store canvas states for undo
    maxUndoSteps: 10, // Limit undo steps to save memory

    init() {
        this.isEraser = false;
        this.hasDrawn = false;
        this.undoStack = [];
    },

    initCanvas(canvas) {
        if (!canvas) return;
        this.canvas = canvas;
        this.ctx = this.canvas.getContext("2d");
        this.resizeCanvas();
        this.setupEventListeners();
        this.saveState(); // Save initial empty state

        // Handle window resize
        window.addEventListener("resize", () => this.resizeCanvas());
    },

    resizeCanvas() {
        if (!this.canvas || !this.ctx) return;
        const container = this.canvas.parentElement;
        this.canvas.width = container.clientWidth;
        this.canvas.height = container.clientHeight;
        this.ctx.lineCap = "round";
        this.ctx.lineJoin = "round";
        // Make lines smoother for better drawing experience
        this.ctx.imageSmoothingEnabled = true;
    },

    setupEventListeners() {
        if (!this.canvas) return;

        // Passive event listeners for better mobile performance
        const options = { passive: true };

        // Mouse events with better performance
        this.canvas.addEventListener(
            "mousedown",
            (e) => this.startDrawing(e),
            options
        );
        this.canvas.addEventListener("mousemove", (e) => this.draw(e), options);
        this.canvas.addEventListener(
            "mouseup",
            () => this.stopDrawing(),
            options
        );
        this.canvas.addEventListener(
            "mouseout",
            () => this.stopDrawing(),
            options
        );

        // Touch events with improved handling for mobile
        this.canvas.addEventListener(
            "touchstart",
            (e) => {
                e.preventDefault();
                const touch = e.touches[0];
                this.startDrawing(touch);
            },
            { passive: false }
        );

        this.canvas.addEventListener(
            "touchmove",
            (e) => {
                e.preventDefault();
                const touch = e.touches[0];
                this.draw(touch);
            },
            { passive: false }
        );

        this.canvas.addEventListener(
            "touchend",
            (e) => {
                e.preventDefault();
                this.stopDrawing();
            },
            { passive: false }
        );

        // Prevent scrolling on mobile when drawing
        this.canvas.addEventListener(
            "touchcancel",
            (e) => {
                e.preventDefault();
                this.stopDrawing();
            },
            { passive: false }
        );
    },

    startDrawing(e) {
        this.isDrawing = true;
        this.hasDrawn = true;
        [this.lastX, this.lastY] = this.getCoordinates(e);
    },

    draw(e) {
        if (!this.isDrawing || !this.ctx) return;

        const [currentX, currentY] = this.getCoordinates(e);

        this.ctx.beginPath();
        this.ctx.moveTo(this.lastX, this.lastY);
        this.ctx.lineTo(currentX, currentY);

        if (this.isEraser) {
            this.ctx.globalCompositeOperation = "destination-out";
            this.ctx.lineWidth = this.lineWidth * 2; // Make eraser bigger
        } else {
            this.ctx.globalCompositeOperation = "source-over";
            this.ctx.strokeStyle = this.color;
            this.ctx.lineWidth = this.lineWidth;
        }

        this.ctx.stroke();
        this.ctx.closePath();

        [this.lastX, this.lastY] = [currentX, currentY];
    },

    stopDrawing() {
        if (this.isDrawing) {
            this.isDrawing = false;
            this.saveState(); // Save state after each drawing action
        }
    },

    getCoordinates(e) {
        const rect = this.canvas.getBoundingClientRect();
        const scaleX = this.canvas.width / rect.width;
        const scaleY = this.canvas.height / rect.height;

        const x = (e.clientX - rect.left) * scaleX;
        const y = (e.clientY - rect.top) * scaleY;
        return [x, y];
    },

    saveState() {
        if (!this.canvas) return;

        // Remove oldest state if we have too many
        if (this.undoStack.length >= this.maxUndoSteps) {
            this.undoStack.shift();
        }

        // Save current canvas state
        this.undoStack.push(this.canvas.toDataURL());
    },

    undoLastStroke() {
        if (this.undoStack.length <= 1) return; // Keep at least the initial state

        // Remove current state
        this.undoStack.pop();

        // Get previous state
        const previousState = this.undoStack[this.undoStack.length - 1];

        // Restore previous state
        const img = new Image();
        img.onload = () => {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            this.ctx.drawImage(img, 0, 0);
        };
        img.src = previousState;

        // Check if we still have drawings
        this.hasDrawn = this.undoStack.length > 1;
    },

    clearCanvas() {
        if (!this.ctx || !this.canvas) return;

        // Add fun clearing animation
        const width = this.canvas.width;
        const height = this.canvas.height;

        // Create a rainbow wipe effect
        let progress = 0;
        const animate = () => {
            progress += 0.1;
            this.ctx.clearRect(0, 0, width * progress, height);

            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                this.ctx.clearRect(0, 0, width, height);
                this.hasDrawn = false;
                this.undoStack = [];
                this.saveState(); // Save empty state
            }
        };

        requestAnimationFrame(animate);
    },

    saveDrawing() {
        if (!this.canvas) return;

        // Create a fun filename with timestamp
        const now = new Date();
        const timestamp = now
            .toLocaleString("en-US", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit",
                hour: "2-digit",
                minute: "2-digit",
            })
            .replace(/[/,:]/g, "-")
            .replace(" ", "_");

        const link = document.createElement("a");
        link.download = `my-awesome-drawing-${timestamp}.png`;
        link.href = this.canvas.toDataURL();
        link.click();

        // Show a fun success message (could be enhanced with a toast notification)
        console.log("🎉 Your amazing artwork has been saved!");
    },
});
