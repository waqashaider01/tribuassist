import { Image } from 'fabric/fabric-impl';
import { UploadedFile } from '../../common/uploads/uploaded-file';
import { SerializedPixieState } from '../history/serialized-pixie-state';
import { UploadAccentProps } from '../../common/uploads/utils/create-upload-input';
export declare class ImportTool {
    /**
     * Open file upload window and add selected image to canvas.
     */
    uploadAndAddImage(): Promise<void>;
    /**
     * Open file upload window and replace canvas contents with selected image.
     */
    uploadAndReplaceMainImage(): Promise<void>;
    /**
     * Open file upload window and replace canvas contents with selected state file.
     */
    uploadAndOpenStateFile(): Promise<void>;
    /**
     * @hidden
     */
    openUploadedFile(file?: UploadedFile | null): Promise<void>;
    /**
     * Replace current editor state with specified one.
     */
    loadState(data: string | SerializedPixieState): Promise<void>;
    /**
     * @hidden
     */
    openUploadWindow(contentTypes?: UploadAccentProps): Promise<UploadedFile | null>;
    /**
     * Open specified data or image as background image.
     */
    openBackgroundImage(image: UploadedFile | HTMLImageElement | string): Promise<Image | undefined>;
    fileIsValid(file: UploadedFile): boolean;
}
export declare function imgContentTypes(): UploadAccentProps;
export declare const stateContentType: UploadAccentProps;
